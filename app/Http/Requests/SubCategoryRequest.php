<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SubCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    #------------------------------------------------------

    public function rules(Request $request)
    {
        $id = !empty($request['item_id']) ? ',' . $request['item_id'] : '';
        return [
            'sub_title' => 'required',
            'categorie_id' => 'required',
            's_url' => 'required|regex:/^[a-z\d-]+$/',
            'sub_name' => 'required|unique:sub_categories,sub_name' . $id,
            'sub_img' => 'image',

        ];
    }
}
