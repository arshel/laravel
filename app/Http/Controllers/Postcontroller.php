<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\storage;
use App\post;
use DB;

class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        //$posts = post::all();
        // return post::where('title', 'post two')->get();
        //   $posts = DB::select('SELECT * FROM posts');
        // $posts = Post::orderBy('title', 'desc')->get();
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'

        ]);

        //handle file upload
        if ($request->hasFile('cover_image')) {
//get file name with the extentin
            $filenamewithExt = $request->file('cover_image')->getClientOriginalName();
            // get just filename
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);

            //get just extention
            $extension = $request->file('cover_image')->getClientOriginalExtension();
//filename to store
            $fileNametostore = $filename . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNametostore);
        } else {
            $fileNametostore = 'noimage.jpg';
        }

        // create post

        $post = new post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNametostore;
        $post->save();

        return redirect('/post')->with('succes', 'post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        // $this->middleware('auth');
        $post = post::find($id);
        return view('post.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $post = post::find($id);

        // check for correct user
        if (auth()->user()->id !== $post->user_id) {

            return redirect('/post')->with('error', 'not your page');

        }

        return view('post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999']);

        //handle file upload
        if ($request->hasFile('cover_image')) {
                //get file name with the extentin
            $filenamewithExt = $request->file('cover_image')->getClientOriginalName();
            // get just filename
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);

            //get just extention
            $extension = $request->file('cover_image')->getClientOriginalExtension();
                //filename to store
            $fileNametostore = $filename . '_' . time() . '.' . $extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNametostore);
        }
                // create post

        $post = post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $fileNametostore;
        }
        $post->save();

        return redirect('/post')->with('succes', 'post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $post = Post::find($id);
        if (auth()->user()->id !== $post->user_id) {

            return redirect('/post')->with('error', 'not your page');

        }

        if($post->cover_image != 'noimage.jpg'){
            // delete image
        storage::delete('public/cover_images/' .$post->cover_image);
        }
        $post->delete();

        return redirect('/post')->with('succes', 'post removed');
    }
}
