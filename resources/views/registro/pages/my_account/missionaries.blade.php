@extends('registro/pages/my_account/my_account_template')
@section('title', 'Missionarios Cadastrados')

@section('my_account_content')
           
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail Principal</th>
                <th scope="col">Alocado em</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($missionaries as $m)
            <tr>
                <th scope="row">{{ $m->id }}</th>
                <td>{{ $m->name }}</td>
                <td>{{ $m->email_1 }}</td>
                <td>{{ $m->allocated_in }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary" title="Visualizar">
                        <span><i class="fas fa-eye"></i> </span>
                    </button>
                    <a href="#excluir" class="btn btn-sm btn-danger" title="Excluir">
                        <span><i class="fas fa-trash"></i> </span>
                    </a>
                    <a href="#editar" class="btn btn-sm btn-info" title="Editar">
                        <span><i class="fas fa-pen"></i> </span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection