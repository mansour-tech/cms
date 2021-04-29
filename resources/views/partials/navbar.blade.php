<a class="navbar-brand text-light" href="{{ url('/') }}" >
    {{ config('app.name', 'Laravel') }}
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse navbar-dark" id="navbarSupportedContent">
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home"></i>&nbsp;{{__('site.Home')}}</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-file"></i>{{__('site.Pages')}}
            </a>
            <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                @foreach($pages as $page)
                <a class="dropdown-item" href="{{ route('page.show',$page->slug ) }}">{{ $page->title }}</a>
                @endforeach
            </div>
        </li>
    </ul>
    <ul class="navbar-nav">
        @auth
        <li class="nav-item ml-3">
            <a class="nav-link" href="{{ route('post.create') }}"><i class="fa fa-plus fa-fw"></i>موضوع جديد</a>
        </li>
        @endauth
        <!-- Search Box -->


        <!-- Authentication Links -->
        @guest
            <li class="nav-item mr-3">
                <a class="nav-link" href="{{ route('login') }}">{{ __('auth.Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('auth.Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ Auth::user()->profile->avatar ?? asset('storage/avatars/avatar.png') }}" alt="Avatar" class="avatar">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right  text-right" aria-labelledby="navbarDropdown">
                    @admin
                    <a class="dropdown-item" href="{{ route('dashboard') }}"><i class="fas fa-cog fa-fw"></i>{{ __('site.Dashboard') }}</a>
                    @endadmin
                    <a class="dropdown-item" href="{{ route('getByUser',auth()->user()->id) }}"><i class="far fa-user fa-fw"></i>{{__('site.Profile')}}</a>
                    <a class="dropdown-item" href="{{ route('settings') }}"><i class="fas fa-cog fa-fw"></i>{{__('site.Settings')}}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out-alt fa-fw"></i>
                        {{ __('auth.Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
