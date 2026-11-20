@php

@endphp

@extends('layouts.fo')

@section('content')
    <h1>Todos os utilizadores 👤</h1>
    <div class="py-2">
        <h4>Users sem estarem carregados da base de dados</h4>
        <ul>
            @foreach ($usersWDB as $user)
                <li>{{ $user['name'] }}-->{{ $user['email'] }}</li>
            @endforeach
        </ul>
    </div>
    <div class="py-2">
        @if (session('message'))
            <div class="alert theme-success py-2">{{ session('message') }}</div>
        @endif
    </div>
    <form action="" method="get">
        <input type="text" name="search">
        <button class="btn-solid btn-secondary" type="submit">Procurar</button>
    </form>
    <div class="py-3">
        <h4>Utilizadores da base de dados</h4>
        <table class="table theme-accent">
            <thead>
                <tr>
                    @auth
                        <th></th>
                    @endauth
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">NIF</th>
                    @auth
                        <th></th>
                    @endauth
                    @if (Auth::user() && Auth::user()->email == 'admin@gmail.com')
                        <th></th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($usersFromDB as $user)
                    <tr>
                        {{-- {{ dd($user->photo) }} --}}

                        <td><img class="photo-table"
                                src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/nophoto.png') }}"
                                alt=""> </td>
                        <th scope="row"> {{ $user->id }} </th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->nif }}</td>
                        @auth
                            <td><a href="{{ route('users.edit', $user->id) }}" class="btn-solid theme-info">Ver/Editar</a></td>
                        @endauth
                        @if (Auth::user() && Auth::user()->email == 'admin@gmail.com')
                            <td><a href="{{ route('users.delete', $user->id) }}" class="btn-solid theme-danger">Apagar</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
