@extends('layouts.layout')





@section('content')
<h1 class='m-auto text-center text-6xl'>Create Post</h1>
@if($errors->any())
    @foreach($errors->all() as $error)
        <h2 class='text-4xl'>{{$error}}</h2>
    @endforeach
@endif


<div class='w-4/5 m-auto pt-200'>
    <form 
    action='/blog' 
    method='POST' 
    enctype='multipart/form-data'>
    @csrf
    <input type='text'
    name='title'
    placeholder='title..'
    class='bg-gray-0 outline-none
     block boorder
     -b-2 w-full h-20
      text-6xl'>
      <textarea name='description' placeholder='Description>..'
      class='py-20 bg-gray-0 block border-b-2 w-full h-60 text-xl outline-none'>
        
    
    </textarea>
    <div class='bg-grey-lighter pt-15'>
        <label class='w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase
         border border-blue cursor-pointer'>
        <span class='mt-2 text-base leading-normal'>
            Select a file

        </span>
        <input type='file'name='image' class='hidden'>
    </label>
    </div>
    <button type='submit' class='uppercase flex mt-15 bg-blue-500 text-gray-100 text-lg 
    font-extrabold py-4 px-8 rounded-3xl'>Submit</button>

    </form>
</div>



@endsection