<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::orderby('id', 'asc')->paginate(Config::get('app.paginate12'));
        $categories = Categories::where('parent_id', '=', null)->orderBy('id', 'asc')->select()->get();
        $categorieChilds = Categories::where('parent_id', '!=', null)->orderBy('id', 'asc')->select()->get();
        $data = [
            'products' => $products,
            'categories' => $categories,
            'categorieChilds' => $categorieChilds,
        ];

        return view('homepage', $data);
    }

    public function get_product_detail($id)
    {
        if( $id != null ){
            $products = Product::where('id', '=' , $id)->get();
            $data = [
                'products' => $products,
            ];

            return view('pages.components.detailproduct', $data);
        } else {

            return back()->withErrors( trans('message.fail'));
        }
    }
}
