<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategoryRequest;
use App\SubCategory;

class SubCategoriesController extends MainController
{

    public function index()
    {
        self::$viewData['subcategories'] = SubCategory::all()->toArray();
        return view('cms.subcategories_index', self::$viewData);
    }
    #------------------------------------------------------

    public function create()
    {
        return view('cms.subcategory_add', self::$viewData);
    }
    #------------------------------------------------------

    public function store(SubCategoryRequest $request)
    {
        SubCategory::save_new($request);
        return redirect('cms/subcategories');
    }
    #------------------------------------------------------

    public function show($id)
    {
        self::$viewData['item_id'] = $id;
        return view('cms.subcategory_delete', self::$viewData);
    }

    #------------------------------------------------------

    public function edit($id)
    {
        self::$viewData['item'] = Subcategory::find($id)->toArray();

        return view('cms.subcategory_edit', self::$viewData);
    }

    #------------------------------------------------------

    public function update(SubCategoryRequest $request, $id)
    {
        Subcategory::update_item($request, $id);
        return redirect('cms/subcategories');
    }

    #------------------------------------------------------

    public function destroy($id)
    {
        SubCategory::destroy($id);
        return redirect('cms/subcategories');
    }
}
