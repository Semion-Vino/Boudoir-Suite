<?php

namespace App;

use App\boudoir;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public static function save_new($request)
    {
        $image_name = boudoir::imageHandling('no-image.png', 'sub_img', $request, 70, null);

        $subcategory = new self();
        $subcategory->sub_title = ucfirst($request['sub_title']);
        $subcategory->categorie_id = $request['categorie_id'];
        $subcategory->s_url = $request['s_url'];
        $subcategory->sub_name = $request['sub_name'];
        $subcategory->sub_img = $image_name;
        $subcategory->save();
    }
#-----------------------------------------------------------------------------------
    public static function update_item($request, $id)
    {

        $image_name = boudoir::imageHandling('', 'sub_img', $request, 70, null);

        $subcategory = self::find($id);
        $subcategory->sub_title = ucfirst($request['sub_title']);
        $subcategory->categorie_id = $request['categorie_id'];
        $subcategory->s_url = $request['s_url'];
        $subcategory->sub_name = $request['sub_name'];
        if ($image_name) {
            $subcategory->sub_img = $image_name;
        }
        $subcategory->save();
    }

}
