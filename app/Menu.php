<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public static function save_new($request)
    {
        $menu = new self();
        $menu->link = $request['link'];
        $menu->url = $request['url'];
        $menu->title = $request['title'];
        $menu->save();
    }
    #--------------------------------------------------------------
    public static function update_item($request, $id)
    {
        $menu = self::find($id);

        $menu->link = $request['link'];
        $menu->url = $request['url'];
        $menu->title = $request['title'];
        $menu->save();
    }
}
