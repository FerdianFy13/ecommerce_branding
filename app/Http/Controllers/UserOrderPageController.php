<?php

namespace App\Http\Controllers;

use App\Order;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class UserOrderPageController extends Controller
{
    public function index(){
        
        return view('profile.user-order');
    }
    public function userOrders(){
        $orders=Order::where('user_id',auth()->user()->id);
        return Datatables::of($orders)
        ->addColumn('action', function ($order) {
            return '<a href="/dashboard/orders/view/'.$order->id.'" class="btn btn-xs btn-primary">View</a>';
        })
        ->editColumn('created_at', function ($order) {
            return $order->created_at->diffForHumans();
        })
        ->editColumn('status', function ($order) {
            if($order->status=='processing'){
                return '<span class="text-warning">'.$order->status.'</span>';
            }
            else if($order->status=='canceled'){
                return '<span class="text-error">'.$order->status.'</span>';
            }
            else{
                return '<span class="text-success">'.$order->status.'</span>';
            }   
        })
        ->rawColumns(['status','action'])
        ->make(true);
    }
    public function viewOrderDetails($id){
        $order=Order::where('id',$id)->firstorfail();
        if($order->user_id!=auth()->user()->id){
            return abort('404');
        }

        return view('profile.order-details',compact('order'));
    }
    
}
