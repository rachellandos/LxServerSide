@php

@endphp

@extends('layouts.fo')

@section('content')
    <img src="{{ asset('images/gato.avif') }}" alt="" width="900px">

    {{-- @if (isset($courseName))
        <h1>Olá {{ $courseName }}</h1>
    @else
        <h1>Olá user</h1>
    @endif --}}

    <h2>Olá {{ isset($courseName) ? $courseName : 'user' }}</h2>
    <h5>O contacto é o {{ $contactInfo['name'] }} - {{ $contactInfo['contact'] }}</h5>
    <h3>Alunos da turma {{ $cesae_info['name'] }} </h3>
    <ul>
        @if (@isset($students))
            @foreach ($students as $student)
                <li> {{ $student }} </li>
            @endforeach
        @endif
    </ul>

    <h3>Funcionalidades da nossa app</h3>
    <ul>
        <li><a href="{{ route('welcome') }}">Welcome Page</a></li>
        <li><a href="{{ route('users.all') }}">Utilizadores</a></li>
        <li><a href="{{ route('tasks.all') }}">Tarefas</a></li>
        <li><a href="{{ route('gifts.all') }}">Presentes</a></li>
    </ul>
@endsection
