<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    protected $fillable = ['category_id', 'blog_title', 'blog_short_description', 'blog_long_description', 'blog_image', 'publication_status'];

    private function imageUpload() {

    }

    public static function saveBlogInfo($request) {
//        Blog::create($request->all());

        $blogImage = $request->file('blog_image');

        $imageName = $blogImage->getClientOriginalName();
        $directory = './blog-images/';
        $blogImage->move($directory, $imageName);

        $blog = new Blog();
        $blog->category_id              = $request->category_id;
        $blog->blog_title               = $request->blog_title   ;
        $blog->blog_short_description   = $request->blog_short_description;
        $blog->blog_long_description    = $request->blog_long_description;
        $blog->blog_image               = $directory.$imageName;
        $blog->publication_status       = $request->publication_status;
        $blog->save();
    }

    public static function updateBlogInfo($request) {
        $blog = Blog::find($request->id);
        $blogImage = $request->file('blog_image');
        if ($blogImage) {

            //*****to remove blog image*****
            unlink($blog->blog_image);

            //*****to upload new blog image*****
            $imageName = $blogImage->getClientOriginalName();
            $directory = './blog-images/';
            $blogImage->move($directory, $imageName);

            //*****to update new blog info*****
            $blog->blog_image               = $directory.$imageName;

        }

        $blog->category_id              = $request->category_id;
        $blog->blog_title               = $request->blog_title   ;
        $blog->blog_short_description   = $request->blog_short_description;
        $blog->blog_long_description    = $request->blog_long_description;
        $blog->publication_status       = $request->publication_status;
        $blog->save();

    }


}
