<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Menu;
use App\SubCategory;

class MainController extends Controller
{
    static $viewData = ['page_title' => ''];

    public function __construct()
    {
        self::$viewData['categories'] = Categorie::all()->toArray();
        self::$viewData['sub_categories'] = SubCategory::all()->toArray();
        self::$viewData['menu'] = Menu::all()->toArray();

    }
    public static function randomProducts()
    {
        return \DB::table('products as p')
            ->join('sub_categories as s', 's.id', '=', 'p.subcategorie_id')
            ->join('categories as c', 'c.id', '=', 'p.categorie_id')
            ->select('p.p_title', 'p.id', 'p.price', 'p.discount', 'p.p_url', 'p.p_image', 'p.full_price', 'c.c_url', 's.s_url')
            ->inRandomOrder()
            ->limit(4)
            ->get();
    }
}
