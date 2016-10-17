<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $post_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
            'name' => 'required|max:255|min:5',
            'email' => 'email|required',
            'body' => 'required|max:2000|min:5'
        ));
        $comment = new Comment();
        $post = Post::find($post_id);
        $comment -> name = $request -> input('name');
        $comment -> email = $request -> input('email');
        $comment -> comment = $request -> input('body');
        $comment -> approved = true;
        $comment -> post() -> associate($post);
        $comment -> save();

        Session::flash('success', 'The comment was successfully added!');
        return redirect()->route('blog.single', [$post->slug]);
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
        $comment = Comment::find($id);
        return view('comments/edit')->with('comment', $comment);
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
        $comment = Comment::find($id);
        $this->validate($request, [
           'comment' => 'required|max:2000|min:5'
        ]);
        $comment -> save();
        Session::flash('success', 'The comment was successfully updated!');
        $comment -> comment = $request -> comment;
        $comment -> save();
        return redirect()->route('posts.show', $comment->post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment-> delete();
        Session::flash('success', 'The comment post was successfully deleted!');
        return redirect()->route('posts.show', $post_id);
    }

    public function delete ($id) {
        $comment = Comment::find($id);
        return view('comments/delete') -> with('comment', $comment);
    }
}
