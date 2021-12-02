<?php

namespace App\Http\Controllers;

use App\Models\addBlogCont as ModelsAddBlogCont;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class addBlogCont extends Controller
{
    public function addBlog(Request $req){
        $model  =new ModelsAddBlogCont;
        $model->title = $req->title;
        $model->description = $req->desc;
        $model->userid = Auth::user()->id;
        
        $file = $req->file('file');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('uploads/users/',$filename);
        
        $model->file=$filename;
        
        $model->save();
        
        $req->session()->flash('flashuser',$req->title);
        return redirect('addBlog');
    }

    public function updateBlog(Request $req){

        $model = ModelsAddBlogCont::find($req->id); 
        $model->title = $req->title;
        $model->description = $req->desc;

        if($req->hasFile('file')){
            $file = $req->file('file');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/users/',$filename);
            $model->file = $filename;
        }

        $model->save();
        $req->session()->flash('flashuser',$req->title);
        //return redirect()->back();
        return redirect()->route('dashboard');
    }
}
