<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $tags = Tag::orderBy('name', 'asc')->get();
        return view('posts.create')
            ->with('categories', $categories)
            ->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' => 'required'
        ));

        // Store the data
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->save();

        $post->tags()->sync($request->tags, false);

        // Redirect to another page
        Session::flash('success', 'The blog post was successfully saved.');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::orderBy('name', 'asc')->get();
        $fetch_categories = [];
        foreach($categories as $category) {
            $fetch_categories[$category->id] = $category->name;
        }

        $tags = Tag::orderBy('name', 'asc')->get();
        $fetch_tags = [];
        foreach($tags as $tag) {
            $fetch_tags[$tag->id] = $tag->name;
        }

        return view('posts.edit')
            ->with('post', $post)
            ->with('categories', $fetch_categories)
            ->with('tags', $fetch_tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the data
        $post = Post::find($id);
        // Checkif slug has changed
        if($request->input('slug') != $post->slug) {
            $this->validate($request, [
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required'
            ]);
        }else {
            $this->validate($request, [
                'title' => 'required|max:255',
                'body' => 'required'
            ]);
        }
        // Store the data
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');
        $post->save();

        $post->tags()->sync($request->tags);

        // Redirect with flash data to posts.show
        Session::flash('success', 'This post was successfully saved.');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        // Redirect with flash data to posts.show
        Session::flash('success', 'The post was successfully deleted.');
        return redirect()->route('posts.index');
    }
}
