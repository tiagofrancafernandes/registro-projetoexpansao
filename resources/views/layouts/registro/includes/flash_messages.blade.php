
@if($error = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong class="alert-link">Erro!</strong> {{ $error }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if($success = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong class="alert-link">Sucesso!</strong> {{ $success }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if($alert = Session::get('alert'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong class="alert-link">!</strong> {{ $alert }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if($info = Session::get('info'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong class="alert-link">!</strong> {{ $info }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif