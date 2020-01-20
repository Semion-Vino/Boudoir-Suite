<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class BillingInfo extends Model
{
    public static function save_new($request)
    {
        $data = new self();
        $data->user_id = Session::get('user_id');
        $data->city = ucfirst($request['city']);
        $data->street = ucfirst($request['street']);
        $data->apartment = $request['apartment'];
        $data->zip = $request['zip'];
        $data->phone = $request['phone'];
        $data->save();
    }
}
