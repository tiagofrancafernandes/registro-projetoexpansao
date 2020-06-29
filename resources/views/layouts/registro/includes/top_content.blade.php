<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-info">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('/') }}registro/img/registro_logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Registro
      </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('error_page_404') }}">404</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('my_account.missionary_form') }}">Cadastro de Missionario</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="{{ __('Search') }}">
            <button class="btn btn-success my-2 my-sm-0" type="submit">{{ __('Search') }}</button>
        </form>
        <div class="dropdown form-inline my-2 my-lg-0">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @guest
                    <span> Entrar <i class="fas fa-user-shield"></i> </span>
                @else
                    <span>{{ Auth::user()->name }} <span class="caret"></span> <i class="fas fa-user-shield"></i> </span>
                @endguest
    
            </button>
    
    
            @guest
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="{{ route('login') }}" class="dropdown-item">{{ __('Login') }}</a>
                <a href="{{ route('register') }}" class="dropdown-item">{{ __('Create account') }}</a>
            </div>
            @else
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="{{ route('my_account.dashboard') }}" class="dropdown-item">{{ __('My account') }}</a>
                <a href="{{ route('logout') }}" class="dropdown-item"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    Sair
                </a>
    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>       
            @endguest
        </div>
    </div>
  </nav>
