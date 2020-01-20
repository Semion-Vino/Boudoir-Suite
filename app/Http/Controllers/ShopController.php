<?php

namespace App\Http\Controllers;

use App\BillingInfo;
use App\boudoir;
use App\Http\Requests\BillingRequest;
use App\Order;
use App\Product;
use Cart;
use DB;
use Illuminate\Http\Request;
use Session;

class ShopController extends MainController
{
    public function getProducts($surl)
    {

        Product::getProducts($surl, self::$viewData);

        return view('productsNew', self::$viewData);
    }
    #------------------------------------------------------

    public function item($curl, $surl, $purl)
    {
        if ($item = Product::where('p_url', '=', $purl)->first()) {
            $item = $item->toArray();
        } else {
            abort(404);
        }

        Product::fetchRelatedProducts($surl, $purl, self::$viewData);

        self::$viewData['rel_prod'] = self::$viewData['rel_prod']->toArray();
        //dd(self::$viewData['rel_prod']);
        self::$viewData['page_title'] = $item['p_title'];
        self::$viewData['item'] = $item;
        return view('item', self::$viewData);
    }
    #------------------------------------------------------
    public function addToCart(Request $request)
    {

        Product::addToCart($request['pid'], $request['size'], $request['quantity']);

    }
    #------------------------------------------------------
    public function cart()
    {
        $p_url = \DB::table('products')->select('p_url')->get();
        // dd($p_url);

        $cart = Cart::getContent()->toJson();
        $cart = json_decode($cart, true);

        sort($cart);

        $itemsInCart = [];
        foreach ($cart as $i) {
            array_push($itemsInCart, $i['id']);
        }
        //dd($itemsInCart);

        self::$viewData['cart'] = $cart;

        self::$viewData['page_title'] = 'Cart';

        return view('cart', self::$viewData);
    }
    #------------------------------------------------------
    public function clearCart()
    {
        Cart::clear();
        return redirect('shop/cart');
    }
    #------------------------------------------------------
    public function removeItem($pid)
    {
        Cart::remove($pid);
        return redirect('shop/cart');
    }
    #------------------------------------------------------
    public function updateCart(Request $request)
    {
        Product::updateCart($request['pid'], $request['op']);
    }
#------------------------------------------------------
    /* public function checkout()
    {
    Order::save_new();
    return redirect('shop/categories');
    }*/
    #------------------------------------------------------
    public function getBillingDetails()
    {

        if (Cart::isEmpty()) {
            return redirect('shop/cart');
        }
        if (!Session::has('user_id')) {
            return redirect('user/signin?rn=shop/cart');
        }

        $details = Order::getBillingDetails();

        self::$viewData['total'] = Cart::getTotal();
        self::$viewData['bill_info'] = $details[0];
        self::$viewData['page_title'] = 'Checkout';
        self::$viewData['countries'] = boudoir::getCountries();
        return view('checkout', self::$viewData);
    }
    #------------------------------------------------------

    public function postCheckout(BillingRequest $request)
    {
        $exists = DB::table('billing_infos')
            ->where('user_id', '=', Session::get('user_id'))
            ->get()
            ->toArray();
        if (!$exists) {
            BillingInfo::save_new($request);
        }
        Order::save_new();

        return view('orderplaced', self::$viewData);
    }
    public function orderPlaced()
    {

    }
    #------------------------------------------------------
    /*public function categories()
    {
    self::$viewData['categories'] = Categorie::all()->toArray();

    self::$viewData['page_title'] = 'Categories';
    return view('categories', self::$viewData);
    }*/
    #------------------------------------------------------
    /*public function menProducts($surl)
    {
    Product::getWomenProducts($surl, self::$viewData);

    return view('productsNew', self::$viewData);
    }*/

    #------------------------------------------------------
    /*public function products($curl)
    {
    //Cart::clear();
    Product::getProducts($curl, self::$viewData);
    self::$viewData['categories'] = Categorie::all()->toArray();

    self::$viewData['sub_categories'] = Categorie::getSubCategories(self::$viewData['categories']);
    return view('products', self::$viewData);
    }*/
    #------------------------------------------------------
}
