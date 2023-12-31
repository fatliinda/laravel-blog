@extends('layouts.layout')



@section('styles')
    <!-- Additional styles for this page -->
    <style>
        /* Your page-specific styles */
    </style>
@endsection

@section('content')
@foreach($posts as $post)
<section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=1">
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Technology</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->title}}</a>
                    <p href="#" class="text-sm pb-3">
                        By <a href="#" class="font-semibold hover:text-gray-800">{{$post->user->name}}</a>, Written at{{date('jS M Y',strtotime($post->updated_at))}}
                    </p>
                    <a href="#" class="pb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis porta dui. Ut eu iaculis massa. Sed ornare ligula lacus, quis iaculis dui porta volutpat. In sit amet posuere magna..</a>
                    <a href="{{ route('posts.show', ['slug' => $post->slug]) }}" class="uppercase text-gray-800 hover:text-black">
    Continue Reading <i class="fas fa-arrow-right"></i>
</a>
               
@auth
    @if (auth()->user()->id === $post->user_id)
        <!-- Show "Edit" button here -->
        <a href="{{ route('posts.edit', ['slug' => $post->slug]) }}" class="btn btn-primary">Edit</a>
        <span class="btn btn-primary">
            <form action="/blog/{{$post->slug}} " 
            method='POST'>
            @csrf
            @method('delete')
            <button type="submit"class="text-red-500 pr-3">DELETE</button>
        
        </span>
    @endif
@endauth

                </div>
            </article>
@endforeach
@endsection