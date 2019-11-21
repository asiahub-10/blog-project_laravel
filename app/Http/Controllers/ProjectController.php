<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Comment;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index() {
        return view('front.home.home', [
            'blogs'         =>  Blog::where('publication_status', 1)->orderBy('id', 'desc')->get(),
//            'categories'    =>  Category::where('publication_status', 1)->get(),
            'sliders'       =>  Slider::where('publication_status', 1)->get(),
            'popularBlogs'  =>  Blog::orderBy('hit_count', 'desc')->get()

        ]);
    }

    public function categoryBlog($id, $name) {
        return view('front.category.category-blog', [
//            'categories'    =>  Category::where('publication_status', 1)->get(),
            'blogs'         =>  Blog::where('category_id', $id)->where('publication_status', 1)->get()
        ]);
    }

    public function blogDetails($id) {

        $blog = Blog::find($id);
        $blog->hit_count = $blog->hit_count + 1;
        $blog->save();


        return view('front.blog.blog-details', [
//            'categories'    =>  Category::where('publication_status', 1)->get(),
            'blog'          =>  Blog::find($id),
//            'comments'      =>  Comment::orderBy('id', 'desc')->get()
            'comments'      =>  DB::table('comments')
                                    ->join('visitors', 'comments.visitor_id', '=', 'visitors.id')
                                    ->select('comments.*', 'visitors.first_name', 'visitors.last_name')
                                    ->where('comments.blog_id', $id)
                                    ->where('comments.publication_status', 1)
                                    ->orderBy('comments.id', 'desc')
                                    ->get(),
        ]);
    }
}

