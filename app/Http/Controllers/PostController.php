<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the blog posts in it from the database

        $posts = Post::orderBy('id','desc')->paginate(10);

        //return a view and pass in tha above variable
        return view('posts.index')->with('posts',$posts);         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data ...
        $this->validate($request, array(
            'title'=>'required|max:255',
            'body'=>'required'
            ));

        //store in the database...

        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        Session::flash('success','The blog post was successfully save!');

        //redirect to another page...

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

        return view('posts.show')->withPost($post);
        
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

        return view('posts.edit')->withPost($post);        
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
        // validate data
        $this->validate($request, array(
                'title' => 'required | max:255',
                'body' => 'required'

            ));

        //save data to the database

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

        //set flash data with success message

        Session::flash('success','This post was successfully saved.');

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

       Session::flash('success','This post was successfully deleted!');

       return redirect()->route('posts.index');
    }
}
