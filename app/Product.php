<?php

namespace App;

use App\boudoir;
use Cart;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    #------------------------------------------------------

    public static function getProducts($surl, &$viewData)
    {

        $products = \DB::table('products as p')
            ->join('sub_categories as s', 's.id', '=', 'p.subcategorie_id')
            ->join('categories as c', 'c.id', '=', 'p.categorie_id')
            ->select('p.*', 's.sub_title', 's.s_url', 'c.c_url')
            ->where('s.s_url', '=', $surl)
            ->paginate(21);

        if (count($products) == 0) {
            abort(404);
        }

        $viewData['products'] = $products;

        $viewData['page_title'] .= $products[0]->sub_title;
    }

#------------------------------------------------------
    public static function fetchRelatedProducts($surl, $purl, &$viewData)
    {
        $related_products = \DB::table('products as p')
            ->join('sub_categories as s', 's.id', '=', 'p.subcategorie_id')
            ->join('categories as c', 'c.id', '=', 'p.categorie_id')
            ->select('p.p_title', 'p.id', 'p.price', 'p.p_url', 'p.discount', 'p.p_image', 'p.full_price', 'c.c_url', 's.s_url')
            ->where('s.s_url', '=', $surl)
            ->whereNotIn('p_url', [$purl])
            ->inRandomOrder()
            ->limit(4)
            ->get();
        $viewData['rel_prod'] = $related_products;

    }
#------------------------------------------------------
    public static function update_item($request, $id)
    {
        $image_name = boudoir::imageHandling('', 'p_image', $request, 800, 1200);

        $product = self::find($id);
        $product->p_title = ucwords($request['p_title']);
        $product->categorie_id = $request['categorie_id'];
        $product->subcategorie_id = $request['subcategorie_id'];
        $product->p_url = $request['p_url'];
        $product->p_article = $request['p_article'];
        $product->full_price = $request['full_price'];
        $product->price = $request['price'];
        $product->discount = $request['discount'];
        $product->xs = $request['xs'] ? 1 : 0;
        $product->s = $request['s'] ? 1 : 0;
        $product->m = $request['m'] ? 1 : 0;
        $product->l = $request['l'] ? 1 : 0;
        $product->xl = $request['xl'] ? 1 : 0;
        if ($image_name) {
            $product->p_image = $image_name;
        }
        $product->save();

        $urls = \DB::table('products as p')
            ->join('sub_categories as s', 's.id', '=', 'p.subcategorie_id')
            ->join('categories as c', 'c.id', '=', 'p.categorie_id')
            ->select('c.c_url', 's.s_url')
            ->where('p.id', '=', $id)
            ->get();
        return $urls;
    }
#------------------------------------------------------
    public static function save_new($request)
    {
        $image_name = boudoir::imageHandling('no-image.png', 'p_image', $request, 800, 1200);

        $product = new self();
        $product->p_title = ucwords($request['p_title']);
        $product->categorie_id = $request['categorie_id'];
        $product->subcategorie_id = $request['subcategorie_id'];
        $product->p_url = $request['p_url'];
        $product->p_article = $request['p_article'];
        $product->full_price = $request['full_price'];
        $product->price = $request['price'];
        $product->discount = $request['discount'];
        $product->p_image = $image_name;
        $product->xs = $request['xs'] ? 1 : 0;
        $product->s = $request['s'] ? 1 : 0;
        $product->m = $request['m'] ? 1 : 0;
        $product->l = $request['l'] ? 1 : 0;
        $product->xl = $request['xl'] ? 1 : 0;

        $product->save();
    }

#------------------------------------------------------
    public static function addToCart($pid, $size, $quantity)
    {

        if (is_numeric($pid)) {
            if ($product = self::find($pid)) {
                $product = $product->toArray();
                if (!$quantity) {
                    $quantity = 1;
                }
                if (!Cart::get($pid)) {
                    Cart::add($pid, $product['p_title'], $product['price'], $quantity, ['image' => $product['p_image'], 'size' => $size]); //ADD NUMBER OF ITEMS CHOSEN!

                }
            }

        }
    }
    #------------------------------------------------------
    public static function updateCart($pid, $op)
    {
        if (is_numeric($pid)) {
            if (Cart::get($pid)) {
                if ($op == 'plus') {
                    Cart::update($pid, ['quantity' => 1]);
                } else if ($op == 'minus') {
                    Cart::update($pid, ['quantity' => -1]);
                }
            }
        }
    }
    #------------------------------------------------------

    /* public static function getMenProducts($surl, &$viewData)
    {
    $products = \DB::table('products as p')
    ->join('sub_categories as s', 's.id', '=', 'p.subcategorie_id')
    ->join('categories as c', 'c.id', '=', 'p.categorie_id')
    ->select('p.*', 's.sub_title', 's.s_url', 'c.c_url')
    ->where('s.s_url', '=', $surl)
    ->paginate(21);

    if (count($products) == 0) {
    abort(404);
    }

    $viewData['products'] = $products;

    $viewData['page_title'] .= $products[0]->sub_title;
    }*/
    #------------------------------------------------------
    /* public static function getProducts($curl, &$viewData)
{
$products = \DB::table('products as p')
->join('categories as c', 'c.id', '=', 'p.categorie_id')
->select('p.*', 'c.c_title', 'c.c_url')
->where('c.c_url', '=', $curl)
->paginate(21);

if (count($products) == 0) {
abort(404);
}

$viewData['products'] = $products;
$viewData['page_title'] .= $products[0]->c_title;
}*/

}
