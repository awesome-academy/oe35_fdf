<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Requests\AddCategoriesRequest;
use App\Http\Requests\EditCategoriesRequest;
class AdminCategoriesController extends Controller
{

    public function getAdminListCategory(){
        $data['catelist'] = Categories::orderby('id', 'asc')->paginate(Config::get('app.paginate'));

        return view('admin.categories.listcategories',$data);
    }

    public function getAdminAddCategory(){
        $data['catelist'] = Categories::all();

        return view('admin.categories.addcategories',$data);
    }

    public function postAdminAddCategory(EditCategoriesRequest $request){
        $cate = new Categories;
        $cate->categories_name = $request->categories_name;
        $cate->parent_id = $request->parent_id;
        $cate->save();

        return redirect()->intended('categories');
    }

    public function getAdminEditCategory($id){
        if($id != null){
            $data['editcate'] = Categories::find($id);
            $data['catelist'] = Categories::all();

            return view('admin.categories.editcategories',$data);
        }
        else
        {
            return back()->withErrors( __('message.edit'));
        }
    }

    public function postAdminEditCategory(EditCategoriesRequest $request, $id){
        if($id != null){
            $cate = Categories::find($id);
            $cate->categories_name = $request->categories_name;
            $cate->parent_id = $request->parent;
            $cate->save();

            return redirect()->intended('categories');
        }
        else
        {
            return back()->withErrors( __('message.edit'));
        }
    }

    public function getAdminDeleteCategory($id){
        if($id != null){
            Categories::destroy($id);

            return back();
        }
        else
        {
            return back()->withErrors( __('message.xoa'));
        }
    }
}
