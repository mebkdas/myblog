<?php

namespace App\Http\Controllers;

use App\Models\addBlogCont;
use Illuminate\Support\Facades\DB;

class mainPageController extends Controller
{
    public function showAll(){
        $allBlog = DB::table('blog')
        ->Join('users','users.id','=','blog.userid')
        ->select('blog.*','users.name')
        ->get();


        $blogComment = addBlogCont::with('userName','comments.user')->get();
        // $blogUser = addBlogCont::with('userName')->get();
        
        //$blog = addBlogCont::get(); 
        //dd($blogComment->toArray());

        return view('mainPage',['allBlogs'=>$blogComment]);
    }

}
