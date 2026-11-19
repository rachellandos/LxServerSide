@extends('layouts.fo')

@section('content')
    <h1>Recuperação de Palavra-passe</h1>
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Nunca partilharemos o teu e-mail com ninguém.</div>
            @error('email')
                <p>Email inválido</p>
            @enderror
        </div>

        <button type="submit" class="btn-solid theme-primary">Recuperar</button>
    </form>
@endsection
