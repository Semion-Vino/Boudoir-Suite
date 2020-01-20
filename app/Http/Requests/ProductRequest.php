<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductRequest extends FormRequest
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
            'p_title' => 'required',
            'categorie_id' => 'required',
            'subcategorie_id' => 'required',
            'p_url' => 'required|regex:/^[a-z\d-]+$/|unique:products,p_url' . $id,
            'p_article' => 'required',
            'price' => 'required|numeric',
            'sub_img' => 'image',

        ];
    }
}
