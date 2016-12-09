<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Post;

class WelcomeController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
    	$this->post = $post;
    }

    public function index()
    {
    	$posts = $this->post->with('user')->get();
    	// dd($posts);
       	return view('welcome')->with(compact('posts'));
    }
}
