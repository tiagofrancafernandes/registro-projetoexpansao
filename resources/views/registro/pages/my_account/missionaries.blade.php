@extends('registro/pages/my_account/my_account_template')
@section('title', 'Missionarios Cadastrados')

@section('my_account_content')

<div class="row">
    <div class="col-md-12 mb-3">
        <div class="btn-group">
            <a class="btn btn-outline-primary {{ ($filter_by == 'ALL' ) ? 'active' : '' }}"      
                href="{{ route('my_account.missionaries', ['filter_by' => 'ALL']) }}"> Todos
            </a>

            <a class="btn btn-outline-success {{ ($filter_by == 'approved' ) ? 'active' : '' }}" 
                href="{{ route('my_account.missionaries', ['filter_by' => 'approved']) }}"> Aprovados
            </a>

            <a class="btn btn-outline-danger {{ ($filter_by == 'rejected' ) ? 'active' : '' }}"  
                href="{{ route('my_account.missionaries', ['filter_by' => 'rejected']) }}"> Rejeitados
            </a>

        </div>
    </div>
</div>
           
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail Principal</th>
                <th scope="col">Alocado em</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @php( $iterator = 1)
            @foreach ($missionaries as $m)
            <tr>
                <th scope="row">{{ $iterator++ }}</th>
                <td>{{ $m->id }}</td>
                <td>{{ $m->name }}</td>
                <td>{{ $m->email_1 }}</td>
                <td>{{ $m->allocated_in }}</td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary open_modal view missionary_detail_modal" title="Visualizar" 
                        data-toggle="modal" data-target="#missionary_detail"
                        data-json='{{ json_encode($m) }}'>
                        <span><i class="fas fa-eye"></i> </span>
                    </button>
                    <a href="{{ route('my_account.missionary_delete', $m->id) }}" class="btn btn-sm btn-danger" title="Excluir" 
                        onclick="if (! confirm('Deseja mesmo deletar o cadastro do missionário {{ $m->name }} | {{ $m->id }} ')) { return false; }" >
                        <span><i class="fas fa-trash"></i> </span>
                    </a>
                    <a href="{{ route('my_account.missionary_edit', $m->id) }}" class="btn btn-sm btn-info" title="Editar">
                        <span><i class="fas fa-pen"></i> </span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $missionaries->links("pagination::bootstrap-4") }}

@include('registro/pages/my_account/includes/missionary-modal-details')
@endsection