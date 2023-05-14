<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function show_postingan()
    {
        $posts = Post::select('title', 'excerpt', 'content', 'image', 'id')->get();
        return view('admin.postingan', compact('posts'));
    }

    public function show_arsip()
    {
        return view('admin.arsip');
    }
    
    public function create_post()
    {
        return view('admin.create_post');
    }

    public function store_post(Request $request)
    {
        $validated = $request->validate([
            'title'     => 'required|min:5|max:100',
            'excerpt'   => 'required|min:20|max:150',
            'content'   => 'required|min:50',
            'image'     => 'image|mimes:jpeg,jpg,png|max:4096'
        ]);

        $new_post = new Post;
        $new_post -> title      = $request->title;
        $new_post -> excerpt    = $request->excerpt;
        $new_post -> content    = $request->content;
        $new_post -> author_id  = $request->author_id;

        if($request->hasFile('image')){
            //    define image location in local path
            $location = public_path('/img');

            // ambil file image dan simpan ke local server
            $request->file('image')->move($location, $request->file('image')->getClientOriginalName());

            // simpan nama file di database
            $new_post->image = $request->file('image')->getClientOriginalName(); 
        }

        $new_post->save();

        return redirect('/admin/postingan')->with('status', "Postingan berhasil ditambahkan!");
    }

    public function edit_post($id)
    {
        $post = Post::find($id);
        return view('admin.edit_post', compact('post'));
    }

    public function update_post(Request $request, $id)
    {
        $post = Post::find($id);

        $validated = $request->validate([
            'title'     => 'required|min:5|max:100',
            'excerpt'   => 'required|min:20',
            'content'   => 'required|min:50',
            'image'     => 'image|mimes:jpeg,jpg,png|max:4096'
        ]);

        $post -> title      = $request->title;
        $post -> excerpt    = $request->excerpt;
        $post -> content    = $request->content;
        $post -> author_id  = $request->author_id;

        if($request->hasFile('image')){
            //    define image location in local path
            $location = public_path('/img');

            // ambil file image dan simpan ke local server
            $request->file('image')->move($location, $request->file('image')->getClientOriginalName());

            // simpan nama file di database
            $post->image = $request->file('image')->getClientOriginalName(); 
        }

        $post->save();
        return redirect('/admin/postingan')->with('update_status', 'Postingan berhasil diperbaharui');
    }

    public function delete_post($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/admin/postingan')->with('status', "Postingan berhasil dihapus");
    }
}