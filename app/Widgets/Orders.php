<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Orders extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = \App\Order::count();
        $string = 'Orders';
        $widget_name='orders';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-company',
            'title'  => "{$count} {$string}",
            'text'   => __('You have '.$count.' '.$widget_name.' in your database. Click on button below to view all the '.$widget_name.'.', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => 'View all '.$widget_name.'',
                'link' => route('voyager.'.$widget_name.'.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        $order=\App\Order::first();
        return Auth::user()->can('browse',$order);
    }
}
