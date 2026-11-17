@extends('layouts.fo')

@section('content')
    <h1>Adicionar Utilizadores</h1>

    <form method="POST" action="{{ route('users.store')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="nameHelp">
            @error('name')
                <p>Nome inválido</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We’ll never share your email with anyone else.</div>
            @error('email')
                <p>Email inválido</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        @error('password')
            <p>Password inválida</p>
        @enderror
        <button type="submit" class="btn-solid theme-primary">Submit</button>
    </form>
@endsection
