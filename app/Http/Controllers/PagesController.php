<?php

namespace App\Http\Controllers;

use App\boudoir;
use App\Content;
use App\Product;
use Illuminate\Http\Request;

class PagesController extends MainController
{
    public function home()
    {
        self::$viewData['rand_prod'] = MainController::randomProducts();
        self::$viewData['rand_prod2'] = MainController::randomProducts();

        self::$viewData['page_title'] = 'Home';
        return view('home', self::$viewData);
    }
    #------------------------------------------------------------------------------

    public function content($url)
    {
        self::$viewData['content'] = Content::getContent($url);
        self::$viewData['page_title'] .= !empty(self::$viewData['content'][0]->title) ? self::$viewData['content'][0]->title : '';
        return view('content', self::$viewData);
    }
#------------------------------------------------------------------------------
    public function ajax(Request $request)
    {
        if (!empty($request['search'])) {
            $search = trim($request['search']);

            if ($search) {
                $products = \DB::table('products')
                    ->select('p_title')
                    ->where('p_title', 'like', "%$search%")
                    ->get();
                if ($products) {
                    echo json_encode($products);
                }
            }
        }
    }
    #------------------------------------------------------------------------------

    public function search(Request $request)
    {
        if ($item = Product::where('p_title', '=', $request['search'])->first()) {
            $item = $item->toArray();
        } else {
            abort(404);
        }

        $s_url = boudoir::fetch_urls($item['subcategorie_id'])[0]->s_url;

        Product::fetchRelatedProducts($s_url, $item['p_url'], self::$viewData);
        self::$viewData['rel_prod'] = self::$viewData['rel_prod']->toArray();
        self::$viewData['item'] = $item;
        self::$viewData['page_title'] = $item['p_title'];

        return view("item", self::$viewData);
    }
}
