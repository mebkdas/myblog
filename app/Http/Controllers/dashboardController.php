<?php

namespace App\Http\Controllers;

use App\Models\addBlogCont;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class dashboardController extends Controller
{
    public function showBlog(){
        $userid = Auth::user()->id;
        $blog = addBlogCont::get()->where('userid',$userid);
        //dd($blog);
        return view('dashboard',['blogs'=>$blog]);
    }

    public function viewBlog($id){
        $blog = addBlogCont::where('userid',auth()->user()->id)->findorFail($id);
        return view('viewBlog',['blogs'=>$blog]);
    }

    public function updateBlog($id){
        $blog = addBlogCont::where('userid',auth()->user()->id)->findorFail($id);
        return view('editBlog',['blogs'=>$blog]);
    }
    public function deleteBlog($id){

        addBlogCont::find($id)->delete();
        
        return redirect()->back();
    }


    public function logout(){
            Auth::logout();
            return redirect('/') ;
    }

    public function addto(Request $req){
        $req->session()->flash('flashuser',"Add to Cart");
        return redirect()->back();
    }
}
