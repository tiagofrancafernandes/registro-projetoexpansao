<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.registro.app')

@section('title', 'Home')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')    
<div class="title m-b-md">
    Mapeamento de Regiões e Missionários
</div>

<div class="links">
<a href="#">Cadastrar missionário</a>
</div>
<div class="links">
    <a href="#">Ver locais atendidos</a>
    <a href="#">Cadastrar região</a>
    <a href="#">Pedir missionários</a>
</div>
@endsection