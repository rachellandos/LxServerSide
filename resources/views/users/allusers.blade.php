@php

@endphp

@extends('layouts.fo')

@section('content')
    <h1>Todos os utilizadores 👤</h1>

    <h4>Users sem estarem carregados da base de dados</h4>
    <ul>
        @foreach ($usersWDB as $user)
            <li>{{ $user['name'] }}-->{{ $user['email'] }}</li>
        @endforeach
    </ul>
    <div class="py-3"></div>

    @if (session('message'))
        <div class="alert theme-success">{{ session('message') }}</div>
    @endif
    <a class="btn-solid theme-warning" href=" {{ route('users.add') }} ">Adicionar Utilizador</a>
    <div class="py-3"></div>

    <form action="" method="get">
        <input type="text" name="search">
        <button class="btn-solid btn-secondary" type="submit">Procurar</button>
    </form>

    <div class="py-3"></div>
    <h4>Utilizadores da base de dados</h4>
    <table class="table theme-accent">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">NIF</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersFromDB as $user)
                <tr>
                    <th scope="row"> {{ $user->id }} </th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->nif }}</td>
                    <td><a href="{{ route('users.edit', $user->id) }}" class="btn-solid theme-info">Ver/Editar</a></td>
                    <td><a href="{{ route('users.delete', $user->id) }}" class="btn-solid theme-danger">Apagar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </table>
@endsection
