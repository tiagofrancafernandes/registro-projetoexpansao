@extends('registro/pages/my_account/my_account_template')
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

@section('my_account_content')
@include('registro/forms/add_edit_missionary')
@endsection