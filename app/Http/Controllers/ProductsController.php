<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;

class ProductsController extends MainController
{

    public function index()
    {
        // self::$viewData['products'] = Product::all()->toArray();
        self::$viewData['products'] = \DB::table('products')->paginate(15);
        return view('cms.products_index', self::$viewData);
    }
    #------------------------------------------------------

    public function create()
    {
        return view('cms.product_add', self::$viewData);
    }
    #------------------------------------------------------

    public function store(ProductRequest $request)
    {
        Product::save_new($request);
        return redirect('cms/products');
    }
    #------------------------------------------------------

    public function show($id)
    {
        self::$viewData['item_id'] = $id;
        return view('cms.product_delete', self::$viewData);
    }

    #------------------------------------------------------

    public function edit($id)
    {
        self::$viewData['item'] = Product::find($id)->toArray();

        return view('cms.product_edit', self::$viewData);
    }

    #------------------------------------------------------

    public function update(ProductRequest $request, $id)
    {

        $urls = Product::update_item($request, $id)[0];

        $submit = $request->toArray();
        if (!empty($submit['submit'])) {
            return redirect('cms/products');
        } else if ($submit['submit2']) {
            return redirect('shop/' . $urls->c_url . '/' . $urls->s_url . '/' . $submit['p_url']);

        }
    }

    #------------------------------------------------------

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('cms/products');
    }
}
