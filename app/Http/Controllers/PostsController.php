<?php namespace StartPoint\Http\Controllers;

use StartPoint\Http\Requests;
use StartPoint\Http\Controllers\Controller;
use StartPoint\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $title = $post->title;
       return view('posts.show')->with([
            'title' => $title,
            'post' => $post,
        ]);
    }
}
