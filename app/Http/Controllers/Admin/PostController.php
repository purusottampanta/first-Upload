<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\Policies\PostPolicy;

class PostController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->middleware('auth');
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = auth()->user()->posts()->paginate();
        // $posts = $this->post->with('user')->get();
        return view('admin.posts.index')->with(compact('posts'));
        
        // return view('admin.posts.index', [
        //         'posts' => $this->post->forUser($request->user()),
        //     ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        $data = $request->only('title', 'body');
        $data['slug'] = str_slug($data['title']);

        $request->user()->posts()->create($data);

        return redirect()->route('posts.index')->with('msg', 'successfully done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post->with('user')->findOrFail($id);
        // dd($post);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $data = $request->only('title', 'body');
        $data['slug'] = str_slug($data['title']);

        $post = $this->post->findOrFail($id)->update($data);
        
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->post->find($id)->delete();

        return redirect()->route('posts.index');
    }
}
