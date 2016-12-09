<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Post;

class PostController extends Controller
{
	protected $post;

	public function __construct(Post $post)
	{
		$this->middleware('auth');
		$this->post = $post;
	}

    public function index()
    {
    	return view('admin.createPost');
    }

    public function post(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|max:200',
    		'body' => 'required'
    	]);

    	$data = $request->only('title', 'body');
    	$data['slug'] = str_slug($data['title']);

    	$request->user()->posts()->create($data);


    	return redirect('showPost')->with('msg','successfully done.');   
    }

    public function showPost()
    {
    	return view('admin.showPost');
    }
}
