<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
//use Carbon\Carbon;
class PostsController extends Controller
{
	public function __construct(){
		$this->middleware('auth')->except(['index', 'show']);
	}
    public function index(){
    	$posts = Post::latest();
		if ($request = request(['month', 'year'])) {
		    $posts->filter($request);
		}
		$posts = $posts->get();

    	$archives = Post::archives();

    	return view('posts.index', compact('posts'));
    }

    public function show(Post $post){
    	return view('posts.show', compact('post'));
    }

    public function create(){
    	return view('posts.create');
    }

    public function store(){
    	//validate
    	$this->validate(request(),[
    		'title' => 'required',
    		'body' => 'required'
    	]);
    	/*// create a new post using the request data
    	$post = new Post;
    	$post->title = request('title');
    	$post->body = request('body');
    	// save it to the db
    	$post->save();*/

    	auth()->user()->publish(
    		new Post(request(['title', 'body']))
    	);

    	// and then redirect to the homepage
    	return redirect('/');
    }
}
