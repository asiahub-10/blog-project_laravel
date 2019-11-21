<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public  function addCategory() {
        return view('admin.category.add-category');
    }

    protected function checkCategoryData($request) {
        $this->validate($request, [
            'category_name'             =>  'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u|max:10|min:3',
            'category_description'      =>  'required'
        ]);
    }

    public function newCategory(Request $request) {
       $this->checkCategoryData($request);

        Category::saveCategoryInfo($request);

//        $category = new Category();
//        $category->saveCategoryInfo();

        return redirect('/category/add-category')->with('message', 'Category info save successfully');
    }

    public function manageCategory() {
        $categories = Category::all();
        return view('admin.category.manage-category', [
            'categories'    =>  $categories
        ]);
    }

    public function editCategory($id) {
        $category = Category::find($id);
        return view('admin.category.edit-category', [
            'category'  =>  $category
        ]);
    }

    public function updateCategory(Request $request) {
        Category::updateCategoryInfo($request);
        return redirect('/category/manage-category')->with('message', 'Category Info update successfully');
    }

    public function deleteCategory(Request $request) {
        $blog = Blog::where('category_id', $request->id)->first();
        if ($blog) {
            return redirect('/category/manage-category')->with('message', 'Sorry. We can not delete this category because this category includes some blogs.');

        } else {
            $category = Category::find($request->id);
            $category->delete();

            return redirect('/category/manage-category')->with('message', 'Category Info delete successfully');
        }

    }
}











