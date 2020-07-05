@extends('layouts.registro.app')
@section('title', 'Cadastrar Missionario')

@section('before_end_head')
<style>
    ul#result_cities {
        position: absolute;
        width: 100%;
        max-width: 870px;
        cursor: pointer;
        overflow-y: auto;
        max-height: 400px;
        box-sizing: border-box;
        z-index: 1001;
    }

    ul#result_cities .link-class:hover {
        background-color: #f1f1f1;
    }
</style>
@endsection


@section('content')

@php
// dd(\Route::current()->getName());
@endphp
<div class="row m-1">
    <div class="col-md-12">
        @include('layouts.registro/includes/flash_messages')
    </div>
    <div class="col-md-3">
        <nav class="nav flex-column">
            <a class="nav-link text-white {{ (\Route::current()->getName() == 'my_account.dashboard') ? 'bg-dark' : 'bg-info' }}" 
                href="{{ route('my_account.dashboard') }}">
                Dashboard
            </a>
            <a class="nav-link text-white {{ (\Route::current()->getName() == 'my_account.missionaries') ? 'bg-dark' : 'bg-info' }}" 
                href="{{ route('my_account.missionaries') }}">
                Missionários
            </a>
            <a class="nav-link text-white {{ (\Route::current()->getName() == 'my_account.missionary_form') ? 'bg-dark' : 'bg-info' }}" 
                href="{{ route('my_account.missionary_form') }}">
                Cadastrar missionários
            </a>
        </nav>
    </div>
    <div class="col-md-9 p-3">        
        @yield('my_account_content')
    </div>
</div>
@endsection