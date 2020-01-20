<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public static function getContent($url)
    {
        $content = DB::table('contents as c')
            ->join('menus as m', 'c.menu_id', '=', 'm.id')
            ->where('m.url', '=', $url)
            ->select('c.*', 'm.title')
            ->get()
            ->toArray();

        return $content;
    }
    public static function save_new($request)
    {
        $content = new self();
        $content->menu_id = $request['menu_id'];
        $content->c_title = $request['title'];
        $content->article = $request['article'];
        $content->save();
    }
    public static function update_item($request, $id)
    {
        $content = self::find($id);
        $content->menu_id = $request['menu_id'];
        $content->c_title = $request['title'];
        $content->article = $request['article'];
        $content->save();
    }
}
