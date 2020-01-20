<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Menu;

class MenuController extends MainController
{

    public function index()
    {
        return view('cms.menu_index', self::$viewData);
    }
    #------------------------------------------------------

    public function create()
    {
        return view('cms.menu_add', self::$viewData);
    }
    #------------------------------------------------------

    public function store(MenuRequest $request)
    {
        Menu::save_new($request);
        return redirect('cms/menu');
    }
    #------------------------------------------------------

    public function show($id)
    {
        self::$viewData['item_id'] = $id;
        return view('cms.menu_delete', self::$viewData);
    }

    #------------------------------------------------------

    public function edit($id)
    {
        self::$viewData['item'] = Menu::find($id)->toArray();
        return view('cms.menu_edit', self::$viewData);
    }

    #------------------------------------------------------

    public function update(MenuRequest $request, $id)
    {
        Menu::update_item($request, $id);
        return redirect('cms/menu');
    }

    #------------------------------------------------------

    public function destroy($id)
    {
        Menu::destroy($id);
        return redirect('cms/menu');
    }
}
