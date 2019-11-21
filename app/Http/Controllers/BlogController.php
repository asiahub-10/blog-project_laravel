<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function addBlog() {
//        $categories = Category::where('publication_status', 1)->get();
//        $categories = Category::where('publication_status', 1)->first();
//        $categories = Category::where('publication_status', 1)->skip(3)->take(2)->get();

//        return view('admin.blog.add-blog', [
//            'categories'    =>  $categories
//        ]);


        return view('admin.blog.add-blog', [
            'categories'    =>  Category::where('publication_status', 1)->get()
        ]);

    }

    public function newBlog(Request $request) {
        Blog::saveBlogInfo($request);
        return redirect('/blog/add-blog')->with('message', 'Blog info save successfully');
    }

    public function manageBlog() {
        $blogs = DB::table('blogs')
                    ->join('categories', 'blogs.category_id', 'categories.id')
                    ->select('blogs.*', 'categories.category_name')
//                    ->orderBy('blogs.id', 'asc')
                    ->orderBy('blogs.id', 'desc')
                    ->get();

        return view('admin.blog.manage-blog', [
            'blogs'    =>  $blogs
        ]);
    }

    public function editBlog($id) {
        return view('admin.blog.edit-blog', [
            'categories'    =>  Category::where('publication_status', 1)->get(),
            'blog'          =>  Blog::find($id)
        ]);
    }

    public function updateBlog(Request $request) {
        Blog::updateBlogInfo($request);
        return redirect('blog/manage-blog')->with('message', 'Blog info update successfully');
    }

    public function deleteBlog(Request $request) {
        $blog = Blog::find($request->id);
        if (file_exists($blog->blog_image)) {
            unlink($blog->blog_image);
        }
        $blog->delete();

        return redirect('blog/manage-blog')->with('message', 'Blog info delete successfully');
    }

    public function manageComment() {
        return view('admin.comment.manage-comment', [
            'comments'      =>  DB::table('comments')
                                ->join('visitors', 'comments.visitor_id', '=', 'visitors.id')
                                ->join('blogs', 'comments.blog_id', '=', 'blogs.id')
                                ->select('comments.*', 'visitors.first_name', 'visitors.last_name', 'blogs.blog_title')
                                ->orderBy('comments.id', 'desc')
                                ->get()
        ]);
    }

    public function changeCommentStatus(Request $request) {
        $comment = Comment::find($request->id);

        if ($comment->publication_status == 1) {
            $comment->publication_status = 0;
            $comment->save();
        } else {
            $comment->publication_status = 1;
            $comment->save();
        }

        return redirect('/manage-comment')->with('message', 'Publication status changed successfully');
    }
}


















