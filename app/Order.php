<?php

namespace App;

use Cart;
use Illuminate\Database\Eloquent\Model;
use Session;

class Order extends Model
{
    public static function save_new()
    {
        $cart = Cart::getContent()->toJson();
        $cart = json_decode($cart, true);
        $order = new self();
        $order->user_id = Session::get('user_id');
        $order->data = serialize($cart);

        $order->total = Cart::getTotal();
        $order->save();
        Cart::clear();
    }
#-----------------------------------------------------------------------------
    public static function getOrders()
    {

        $orders = \DB::table('orders as o')
            ->join('users as u', 'u.id', '=', 'o.user_id')
            ->join('billing_infos as bi', 'u.id', '=', 'bi.user_id')
            ->select('o.*', 'u.firstName', 'u.lastName', 'u.country', 'bi.*')
            ->get()
            ->toArray();
        return $orders;
    }
    #-----------------------------------------------------------------------------

    public static function getBillingDetails()
    {
        $check_info = \DB::table('billing_infos')
            ->where('user_id', '=', Session::get('user_id'))
            ->get()
            ->toArray();

        if ($check_info) {
            $details = \DB::table('users as u')
                ->join('billing_infos as bi', 'bi.user_id', '=', 'u.id')
                ->select('bi.*', 'u.firstName', 'u.lastName', 'u.country')
                ->where('u.id', '=', Session::get('user_id'))
                ->get()
                ->toArray();

        } else {
            $details = \DB::table('users')
                ->select('firstName', 'lastName', 'country')
                ->where('id', '=', Session::get('user_id'))
                ->get()
                ->toArray();
        }
        return $details;

    }
}
