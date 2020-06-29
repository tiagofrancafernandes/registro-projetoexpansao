@extends('registro/pages/my_account/my_account_template')
@section('title', 'Missionarios Cadastrados')

@section('my_account_content')

<style>
    div.dash_card a{
        text-decoration: none;
    }
    div.dash_card div.card:hover{
        background-color: #26c6da;
        color: #FFF !important;
    }
    .card-counter {
        box-shadow: 2px 2px 10px #DADADA;
        margin: 5px;
        padding: 20px 10px;
        background-color: #fff;
        height: 100px;
        border-radius: 5px;
        transition: .3s linear all;
    }

    .card-counter:hover {
        box-shadow: 4px 4px 20px #DADADA;
        transition: .3s linear all;
    }

    .card-counter.primary {
        background-color: #007bff;
        color: #FFF;
    }

    .card-counter.danger {
        background-color: #ef5350;
        color: #FFF;
    }

    .card-counter.success {
        background-color: #66bb6a;
        color: #FFF;
    }

    .card-counter.info {
        background-color: #26c6da;
        color: #FFF;
    }

    .card-counter i {
        font-size: 5em;
        opacity: 0.2;
    }

    .card-counter .count-numbers {
        position: absolute;
        right: 35px;
        top: 20px;
        font-size: 32px;
        display: block;
    }

    .card-counter .count-name {
        position: absolute;
        right: 35px;
        top: 65px;
        font-style: italic;
        text-transform: capitalize;
        opacity: 0.5;
        display: block;
        font-size: 18px;
    }
</style>

<div class="row">
    <div class="col-md-3">
        <div class="card-counter info" title="Meus Missionários Cadastrados">
            <i class="fa fa-plus"></i>
            <span class="count-numbers">{{ $missionaries }}</span>
            <span class="count-name">Cadastrados</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-counter success" title="Meus Missionários Aprovados">
            <i class="fa fa-check"></i>
            <span class="count-numbers">{{ $approved_missionaries }}</span>
            <span class="count-name">Aprovados</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-counter danger" title="Total de Missionários Cadastrados">
            <i class="fa fa-users"></i>
            <span class="count-numbers">{{ $total_missionaries }}</span>
            <span class="count-name">Total</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-counter success" title="Total de Missionários Aprovados">
            <i class="fa fa-users"></i>
            <span class="count-numbers">{{ $total_approved }}</span>
            <span class="count-name">Total Aprovados</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 dash_card">
        <a href="{{ route('my_account.missionary_form') }}">
        <div class="card card border-info shadow text-info p-3">
            <i class="fa fa-user-plus"></i>
            Cadastrar Missionário
        </div>
        </a>
    </div>

    <div class="col-md-3 dash_card">
        <a href="{{ route('my_account.missionaries') }}">
        <div class="card card border-info shadow text-info p-3">
            <i class="fa fa-users"></i>
            Missionários
        </div>
        </a>
    </div>

    {{--  <div class="col-md-3 dash_card">
        <a href="{{ route('my_account.missionary_form') }}">
        <div class="card card border-info shadow text-info p-3">
            <i class="fa fa-user-plus"></i>
            Cadastrar Missionário
        </div>
        </a>
    </div>  --}}

</div>
@endsection