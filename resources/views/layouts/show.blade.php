@extends('layouts.layout')



@section('styles')
    <!-- Additional styles for this page -->
    <style>
        /* Your page-specific styles */
    </style>
@endsection
@section('content')

<section class="w-full md:w-2/3 flex flex-col items-center px-3">

            
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
                   
                </div>
            

@endsection