@extends('layouts.app')
@section('title', $post->title)

@section('content')
    <div>
        <h1>{{$post->title}}</h1>
        <p>{{$post->description}}</p>
        <a href="{{route('posts.download', $post)}}">
            <button class="btn btn-primary">{{__('Download jar')}}</button>
        </a>

    </div>

@endsection