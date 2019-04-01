@extends('layouts.app')
@section('title', __('add algorithm'))

@section('content')
    <h1>{{__('Publish a new algorithm')}}</h1>
    <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">{{__('Title')}}</label>
            @if($errors->has('title'))
                <p>{{$errors->get('title')}}</p>
            @endif
            <input type="text" name="title" class="form-control" id="title" placeholder="{{__('Enter the title')}}" required/>
        </div>
        <div class="form-group">
            <label for="description">{{__('Description')}}</label>
            @if($errors->has('description'))
                <p>{{$errors->get('description')}}</p>
            @endif
            <textarea class="form-control" name="description" id="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="jar_file">{{__('Jar file')}}</label>
            @if($errors->has('jar_file'))
                <p>{{$errors->get('jar_file')}}</p>
            @endif
            <input type="file" name="jar_file" id="jar_file" class="form-control-file" required/>
        </div>
        <button class="btn btn-primary">{{__('Add')}}</button>
    </form>
@endsection