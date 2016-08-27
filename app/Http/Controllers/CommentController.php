<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;

class CommentController extends Controller
{
    public function getList() {
    	$comments = Comment::select('id','name','email','message','view','created_at')->orderBy('id','DESC')->get()->toArray();
    	return view('admin.comment.list',compact('comments'));
    }

    public function getSee($id) {
    	$comment = Comment::find($id);
    	$comment->view = 0;
    	$comment->save();

    	return redirect()->route('admin.comment.getList')->with(['flash_status'=>'success','flash_message'=>'Seen!']);
    }

    public function getDelete($id) {
    	Comment::destroy($id);
    	return redirect()->route('admin.comment.getList')->with(['flash_status'=>'success','flash_message'=>'Delete Complete!']);
    }
}
