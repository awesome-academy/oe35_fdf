<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input as input;
use Illuminate\Http\File;
use App\Models\Categories;
use App\Models\Product;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::orderby('id', 'asc')->paginate(Config::get('app.paginate'));

        return view('admin.product.listproduct',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['catelist'] = Categories::all();

        return view('admin.product.addproduct',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductRequest $request)
    {
        $file_name = $request->file('product_img')->getClientOriginalName();
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->product_img = $file_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->categories_id = $request->categories_id;
        $request->file('product_img')->move('image',$file_name);
        $product->save();

        return redirect('admin/product');
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
        $data['products'] = Product::find($id);
        $data['catelist'] = Categories::all();

        return view('admin.product.editproduct',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        if($id != null){
            $product = Product::find($id);
            $product->product_name = $request->product_name;
            if($request->hasFile('product_img')){
                $file_name = $request->file('product_img')->getClientOriginalName();
                $product->product_img = $file_name;
                $request->file('product_img')->move('image',$file_name);
            }
            $product->description = $request->description;
            $product->price = $request->price;
            $product->categories_id = $request->categories_id;
            $product->save();

            return redirect('admin/product');
        }
        else
        {
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
        if($id != null){
            Product::destroy($id);
            return redirect('admin/product');
        }
        else
        {
            return back()->withErrors( __('message.xoa'));
        }
    }
}
