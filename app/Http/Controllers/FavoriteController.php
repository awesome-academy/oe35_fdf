<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Suggest;
use App\Models\Favorite;
use App\Models\Product;
use App\User;
use Session;
use Auth;
use DB;
use App\Http\Requests\FavoriteRequest;
class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['favorites'] = DB::table('product')
        ->join('favorite', 'favorite.product_id', '=', 'product.id')
        ->select('product.*', 'favorite.product_id', 'favorite.user_id')->distinct()->get();
        return view('pages.components.favorite', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $pavorite = new Favorite;
            $pavorite->product_id = $id;
            $pavorite->user_id  = Auth::user()->id;
            $pavorite->save();

            return redirect('/homepage');
        } catch (Exception $e) {

            return back()->withErrors( __('message.edit'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
