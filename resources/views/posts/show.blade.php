@extends('layouts.app')
@section('title', $post->title)

@section('content')
    <div class="row">
        <div class="col-8">
            <div class="post-metadata">
                <h1>{{$post->title}}</h1>
                <p>{{__('By:')}} {{$post->user->name}}</p>
                <span class="ml-auto">
                    <like-box :editable="true"
                              :nb-prop="{{$post->nb_likes}}"
                              like-endpoint="{{route('posts.like', $post)}}"
                              :post-id="{{$post->id}}"
                              {{$liked ? "liked" : ""}}></like-box>
                </span>
            </div>

            <p>{{$post->description}}</p>
            <a href="{{route('posts.download', $post)}}">
                <button class="btn btn-default">{{__('Download jar')}}</button>
            </a>

            <hr>
            <h2>{{__('Comments')}}</h2>
            @foreach($post->comments as $comment)
                <div class="comment-container">
                    <div class="comment-header">
                        <div class="comment-header-author">
                            <h3>{{$comment->user->name}}</h3>
                        </div>
                        <div>
                            <p>{{__('wrote')}}</p>
                        </div>
                        <div class="float-right">
                            <div class="comment-header-date">
                                {{$comment->created_at->format('d/m/Y H:m:s')}}
                            </div>
                            @can('delete', $comment)
                                <div class="comment-header-delete">
                                    <form method="post" action="{{route('comments.delete', $comment)}}">
                                        {{csrf_field()}}
                                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            @endcan
                        </div>


                    </div>

                    <p>{{$comment->text}}</p>
                </div>
                <hr/>
            @endforeach
            <!-- add comment field -->
            <form method="post" action="{{route('posts.comment', $post)}}">
                {{csrf_field()}}
                <textarea class="form-control mb-3" name="text" placeholder="{{__('Add a comment')}}"></textarea>
                <button class="btn btn-success">{{__('Add comment')}}</button>
            </form>

        </div>
    </div>

@endsection