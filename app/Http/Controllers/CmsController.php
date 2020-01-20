<?php

namespace App\Http\Controllers;

use App\Order;

class CmsController extends MainController
{
    public function dashboard()
    {
        return view('cms.dashboard');
    }
    public function orders()
    {
        self::$viewData['orders'] = Order::getOrders();

        return view('cms.orders', self::$viewData);
    }
    public function deleteOrder($id)
    {
        \DB::table('orders')
            ->where('id', '=', $id)
            ->delete();
        return redirect('cms/orders');

    }
    public function deleteAllOrders()
    {
        \DB::table('orders')

            ->delete();
        return redirect('cms/orders');
    }
}
