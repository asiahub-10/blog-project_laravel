<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function newComment(Request $request) {
//        return $request->all();

        Comment::saveComment($request);

        return redirect('/blog-details/'.$request->blog_id)->with('message', 'Your comment post successfully');
    }
}
