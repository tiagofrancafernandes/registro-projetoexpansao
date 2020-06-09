@extends('layouts.registro.app')
@section('title', __('Page Not Found'))

@section('content')
<div class="mt-3"></div>

<div class="d-md-flex flex-md-column justify-content-md-center align-items-md-center h-25">
    <div class="row mt-3 pt-3 card p-2 shadow p-3 mb-5 bg-white rounded">
        <div class="col-md-12 card-body">
            <div class="panel panel-default">
                <div class="panel-heading h1">{{ __('Page Not Found') }}</div>

                <div class="panel-body">
                    <div class="h6">{{ __('Sorry, the page you are looking for could not be found.') }}</div>
                    
                    <div class="d-md-flex flex-md-column justify-content-md-center align-items-md-center h-100">
                        <div class="row mt-3 pt-3 card p-2 mb-5">
                            <div class="col-md-12 card-body">
                                <div class="form-group">
                                    <div class="col-md-12 col-md-offset-4">        
                                        <a class="btn btn-primary" href="{{ url('/') }}">
                                            {{ __('Home Page') }}
                                        </a>
                                        @guest
                                        <a class="btn btn-link" href="{{ route('login') }}">
                                            {{ __('Login') }}
                                        </a>
                                        <a class="btn btn-link" href="{{ route('register') }}">
                                            {{ __('Register') }}
                                        </a>
                                        @else
                                        <a class="btn btn-link" href="{{ url('/') }}">
                                            {{ __('My account') }}
                                        </a>
                                        <a href="{{ route('logout') }}" class="btn btn-link"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form-404').submit();">
                                            Sair
                                        </a>
                            
                                        <form id="logout-form-404" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        @endguest



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection