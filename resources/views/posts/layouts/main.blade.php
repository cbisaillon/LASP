<html>
    <head>
        <title>LSIP - @yield('title')</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body id="app">
        @include('nav.main')
        <div class="container content">
            <div class="row">
                <div class="col-md-9">
                    @yield('content')
                </div>
                <div class="col-md-3">
                    @include('posts.layouts.sidebar')
                </div>
            </div>
        </div>
    </body>
</html>