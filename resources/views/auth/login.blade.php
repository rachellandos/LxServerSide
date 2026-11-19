@extends('layouts.fo')

@section('content')
    <h1>Iniciar Sessão</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Nunca partilharemos o teu e-mail com ninguém.</div>
            @error('email')
                <p>Email inválido</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            @error('password')
                <p>Password inválida</p>
            @enderror
        </div>
        
        <button type="submit" class="btn-solid theme-primary">Login</button>

        <p>Esqueces-te da palavra-passe? Clica <a href="{{route('password.request')}}">aqui</a>. </p>

    </form>
@endsection
