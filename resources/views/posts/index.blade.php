@extends('layouts.app')
@section('title', __('algorithms'))

@section('content')
    @foreach($posts as $post)
            <div class="post clickable" onclick="window.location='{{route('posts.show', $post)}}'">
                <div class="post-meta d-inline">
                    <h3>{{$post->title}}</h3>
                    <p>{{$post->created_at->format('d/m/Y')}}</p>
                    <p>{{__('From')}} {{$post->user->name}}</p>
                </div>
            </div>
        <hr>
    @endforeach
@endsection