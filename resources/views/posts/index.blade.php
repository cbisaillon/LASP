@extends('layouts.app')
@section('title', __('algorithms'))

@section('content')
    <div class="row">
        <div class="col-8">
            <post-list
                    end-point="{{$post_endpoint}}"
                    show-endpoint="{{$show_endpoint}}"></post-list>
        </div>
    </div>

@endsection