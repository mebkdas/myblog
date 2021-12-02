<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function commentBlog(Request $req){
        //dd($req->input());
        $comment = new Comment();
        $comment->comment = $req->comment;
        $comment->uid = $req->uid;
        $comment->bid = $req->bid;
        $comment->save();
        return redirect('/');
    }
}
