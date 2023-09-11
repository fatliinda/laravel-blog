<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;




class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post=Post::all();
    
        return view('layouts.blog')->with('posts',Post::orderBy('updated_at','DESC')->get());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
    
        // Move the uploaded image
        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
    
        if (auth()->check()) {
            // User is logged in, assign the user_id
            $user_id = auth()->user()->id;
        } else {
            // User is not logged in, set user_id to null or some default value
            $user_id = null; // or set it to some default user ID
        }
        // Create a new Post
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $user_id; // Set the user_id
        $post->image_path = $newImageName;
        $post->save();
    
        $post->slug = Str::slug($post->title);
    $post->save();

   Post::create([
    'title'=>$request->input('title'),
    'description'=>$request->input('description'),
    'slug'=> Str::slug($post->title),
    'image_path'=> $newImageName,
    'user_id'=>auth()->user()->id



   ]);
   return redirect('/')
   ->with('message','your post has been added!');
    }

    /**
     * Display the specified resource.
     */
    
    public function show(string $slug)
    {
        return view('layouts.show')
        ->with('post',Post::where('slug',$slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        return view('layouts.edit')
        ->with('post',Post::where('slug',$slug)->first());
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required']);

        Post::where('slug',$slug)
        ->update(['title'=>$request->input('title'),
        'description'=>$request->input('description'),
        'user_id'=>auth()->user()->id]);

        return redirect('/blog')->with('message','your post has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $post=Post::where('slug',$slug);
        $post->delete();
        return redirect('/blog')->with('message','your post has been updated');
    }
}
