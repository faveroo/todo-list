@extends('layouts.app')

@section('title', 'Meu Perfil')

@section('content')

<div class="col-md-6">
    {{ Auth::user()->name; }}
    <hr>
    {{ Auth::user()->completed_tasks; }}
</div>

@endsection