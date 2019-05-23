<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            LASP
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('posts.index')}}">{{__('Algorithms')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('guide.index')}}">{{__('Guides')}}</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('research.index')}}">{{__('Researches')}}</a>
                </li>
                <li>
                    <a target="_blank" class="nav-link" href="https://github.com/lool01/LAOP_alpha">LAOP on Github</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('posts.create')}}">{{__('Publish algorithm')}}</a>
                    </li>
                    <li class="nav-item">
                        <form class="clickable" id="logout-form" method="post" action="{{route('logout')}}">
                            {{csrf_field()}}
                            <a onclick="document.getElementById('logout-form').submit()" class="nav-link">{{__('Log out')}}</a>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>