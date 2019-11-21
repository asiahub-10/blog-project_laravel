<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['visitor_id', 'blog_id', 'comment'];

    public static function saveComment($request) {
        $comment = new Comment();
        $comment->visitor_id        =   $request->visitor_id;
        $comment->blog_id           =   $request->blog_id;
        $comment->comment           =   $request->comment;
        $comment->save();
    }
}
