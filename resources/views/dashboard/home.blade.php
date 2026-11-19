@php

@endphp

@extends('layouts.fo')

@section('content')
    <h1>📊 Dashboards 📈</h1>
    <div class="py-2">
        @auth
            <h2>Olá, {{ Auth::user()->name }}</h2>
        @endauth
    </div>
    @if (Auth::user() && Auth::user()-> user_type == \App\Models\User::TYPE_ADMIN)
        <div class="alert theme-success" role="alert">
            <p>Conta de Administrador</p>
        </div>
    @endif
@endsection
