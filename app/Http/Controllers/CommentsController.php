<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post){
    	// https://laracasts.com/series/laravel-from-scratch-2017/episodes/16?autoplay=true
    	$this->validate(request(),['body'=>'required|min:5']); // min 5 chars
    	$post->addComment(request('body'));
    	return back();
    }
}
