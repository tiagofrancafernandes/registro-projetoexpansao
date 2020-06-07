@php
$validate_email = Session::get('validate_email');
Session::forget('validate_email');
@endphp

@if ($validate_email)
<div class="col-md-8 col-md-offset-4 text-red">
<span class="help-block">
    <strong>{{ $validate_email }}</strong>
</span>
</div>
@endif