<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public static function getSubCategories($arr)
    {
        /*$sub_categories = [];
        foreach ($arr as $i) {
        array_push($sub_categories, $i['c_title']);
        }*/

        $sub_categories['woman'] = \DB::table('women_categories')
            ->get();
        $sub_categories['man'] = \DB::table('men_categories')
            ->get();
        $sub_categories['kids'] = \DB::table('kids_categories')
            ->get();
        return $sub_categories;
    }
}
