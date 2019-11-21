<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Blog;

class Category extends Model
{
    protected $fillable = ['category_name', 'category_description', 'publication_status'];

    public static function saveCategoryInfo($request) {
//    public function saveCategoryInfo($request) {


        //        return $request->all();

//        DB::table('categories')->insert([
//            'category_name' =>  $request->category_name,
//            'category_description' =>  $request->category_description,
//            'publication_status' =>  $request->publication_status
//        ]);

//        $category = new Category();
//        $category->category_name        = $request->category_name;
//        $category->category_description = $request->category_description;
//        $category->publication_status   = $request->publication_status;
//        $category->save();


//        return 'success';


        Category::create($request->all());
    }

    public static function updateCategoryInfo($request) {
        $category = Category::find($request->id);

        $category->category_name        = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status   = $request->publication_status;

        if ($category->publication_status == '0') {
//            $blogs = Blog::where('category_id', $category->id)->get();
            //or,
            $blogs = Blog::where('category_id', $request->id)
                            ->where('publication_status', 1)->get();

            foreach ($blogs as $blog) {
                $blog->publication_status = 2;
                $blog->save();
            }
        } else if ($category->publication_status == '1') {

            $blogs = Blog::where('category_id', $request->id)
                            ->where('publication_status', 2)->get();

            foreach ($blogs as $blog) {
                $blog->publication_status = 1;
                $blog->save();
            }
        }

        $category->save();
    }
}



