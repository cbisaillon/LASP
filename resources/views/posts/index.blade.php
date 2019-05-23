@extends('layouts.app')
@section('title', __('algorithms'))

@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <post-list
                    end-point="{{$post_endpoint}}"
                    show-endpoint="{{$show_endpoint}}"></post-list>
        </div>
        <div class="col-md-4 col-sm-12 about-lrima">
            <h2>About the LRIMa</h2>
            <p class="text-justify">Founded in 2015 by Dr Jihene Rezgui, the Laboratoire de Recherche Informatique de Maisonneuve (LRIMa) gives the opportunity for students of the Maisonneuve College in Montreal, Canada to propose a research project and work on it.</p>
            <p class="text-justify">We developed LAOP and LASP in this research lab.</p>
            <img src="/images/Logo_LRIMA.jpg" alt="The LRIMa logo"/>
        </div>
    </div>

@endsection