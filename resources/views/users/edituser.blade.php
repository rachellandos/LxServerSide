@extends('layouts.fo')

@section('content')
    <h2>Detalhes do Utilizador {{ $userInfo->name }}</h2>
    <p><b>Email: </b>{{ $userInfo->email }}</p>
    <p><b>Address: </b>{{ $userInfo->address }}</p>
    <p><b>NIF: </b>{{ $userInfo->nif }}</p>
    <div>
        <h4>Editar Utilizador </h4>
        <form method="POST" enctype="multipart/form-data" action="{{ route('users.update') }}">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{ $userInfo->id }}">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome</label>
                <input value="{{ $userInfo->name }}" required type="text" name="name" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            @error('name')
                <p>Nome inválido</p>
            @enderror

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input value="{{ $userInfo->email }}" disabled type="email" name="email" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            @error('email')
                <p>email inválido</p>
            @enderror

            <div class="mb-3">
                <label for="address" class="form-label">Morada</label>
                <input value="{{ $userInfo->address }}" type="text" name="address" class="form-control" id="address"
                    aria-describedby="addressHelp">
            </div>

            <div class="mb-3">
                <label for="nif" class="form-label">NIF</label>
                <input value="{{ $userInfo->nif }}" type="text" name="nif" class="form-control" id="nif"
                    aria-describedby="nifHelp">
            </div>

            <div class="mb-3">
                <label for="photo"><b>Fotografía: </b></label>
                <input type="file" name="photo" id="" accept="image/">
            </div>

            <button type="submit" class="btn-solid theme-accent">Submit</button>

        </form>
    </div>
@endsection
