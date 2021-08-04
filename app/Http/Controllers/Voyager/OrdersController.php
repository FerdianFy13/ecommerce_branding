<?php

namespace App\Http\Controllers\Voyager;

use App\Order;
use ReflectionClass;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Events\BreadAdded;
use TCG\Voyager\Database\Types\Type;
use TCG\Voyager\Events\BreadDeleted;
use TCG\Voyager\Events\BreadUpdated;
use TCG\Voyager\Database\Schema\Table;
use TCG\Voyager\Events\BreadDataAdded;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;

class OrdersController extends VoyagerBaseController
{
    
    //***************************************
    //                ______
    //               |  ____|
    //               | |__
    //               |  __|
    //               | |____
    //               |______|
    //
    //  Edit an item of our Data Type BR(E)AD
    //
    //****************************************

    public function edit(Request $request, $id)
    {
        
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $dataTypeContent = (strlen($dataType->model_name) != 0)
            ? app($dataType->model_name)->findOrFail($id)
            : DB::table($dataType->name)->where('id', $id)->first(); // If Model doest exist, get data from table name

        foreach ($dataType->editRows as $key => $row) {
            $dataType->editRows[$key]['col_width'] = isset($row->details->width) ? $row->details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'edit');

        // Check permission
        $this->authorize('edit', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        //customizing ordered item edit
        $order=Order::where('id',$id)->first();

        \Cart::session('backend')->clear();
        \Cart::session('backend')->clearCartConditions();

        if(!is_null($order->ordered_items)){
            $ordered_items=unserialize(base64_decode($order->ordered_items));

            foreach($ordered_items as $row){
                
                if($row->getPriceWithConditions()!=$row->price){
                    $discount=$row->price-$row->getPriceWithConditions();
                    $itemCondition = new \Darryldecode\Cart\CartCondition(array(
                        'name' => $row->name.' discount',
                        'type' => 'product discount',
                        'value' => '-'.$discount,
                    ));
                    \Cart::session('backend')->add(array(
                        array(
                            'id' => $row->id,
                            'name' => $row->name,
                            'price' => $row->price,
                            'quantity' => $row->quantity,
                            'associatedModel' => 'App\Product',
                            'conditions' => [$itemCondition]
                        ), 
                    ));
                }
                else{
                    \Cart::session('backend')->add(array(
                        array(
                            'id' => $row->id,
                            'name' => $row->name,
                            'price' => $row->price,
                            'quantity' => $row->quantity,
                            'associatedModel' => 'App\Product',
                        ), 
                    ));
                }   
            }
        }

        if(!is_null($order->conditions)){
            $conditions=unserialize(base64_decode($order->conditions));

            foreach($conditions as $condition){
                $condition = new \Darryldecode\Cart\CartCondition(array(
                    'name' => $condition->getName(),
                    'type' => $condition->getType(),
                    'target' => 'total', // this condition will be applied to cart's total when getTotal() is called.
                    'value' => $condition->getValue(),
                ));
        
                \Cart::session('backend')->condition($condition);
            }
            
        }
        
        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'));
    }
    // POST BR(E)AD

    
    public function update(Request $request, $id)
    {
        $request->merge([
            'ordered_items'=>base64_encode(serialize(\Cart::session('backend')->getContent())),
            'conditions'=>base64_encode(serialize(\Cart::session('backend')->getConditions())),
        ]);

        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

        // Check permission
        $this->authorize('edit', $data);

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id);

        if ($val->fails()) {
            //return response()->json(['errors' => $val->messages()]);
            return back()->withErrors($val->messages());

        }

        if (!$request->ajax()) {
            $this->insertUpdateData($request, $slug, $dataType->editRows, $data);

            event(new BreadDataUpdated($dataType, $data));

            \Cart::session('backend')->clear();
            \Cart::session('backend')->clearCartConditions();

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager::generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }
    
    //***************************************
    //
    //                   /\
    //                  /  \
    //                 / /\ \
    //                / ____ \
    //               /_/    \_\
    //
    //
    // Add a new item of our Data Type BRE(A)D
    //
    //****************************************

    public function create(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
                            ? new $dataType->model_name()
                            : false;

        foreach ($dataType->addRows as $key => $row) {
            $dataType->addRows[$key]['col_width'] = isset($row->details->width) ? $row->details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'add');

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable'));
    }

    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->merge([
            'ordered_items'=>base64_encode(serialize(\Cart::session('backend-add')->getContent())),
            'conditions'=>base64_encode(serialize(\Cart::session('backend-add')->getConditions())),
        ]);

        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows);

        if ($val->fails()) {
            //return response()->json(['errors' => $val->messages()]);
            return back()->withErrors($val->messages());
        }

        if (!$request->has('_validate')) {

            $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

            event(new BreadDataAdded($dataType, $data));

            if ($request->ajax()) {
                return response()->json(['success' => true, 'data' => $data]);
            }

            \Cart::session('backend-add')->clear();
            \Cart::session('backend-add')->clearCartConditions();

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                        'message'    => __('voyager::generic.successfully_added_new')." {$dataType->display_name_singular}",
                        'alert-type' => 'success',
                    ]);
        }
    }
}
