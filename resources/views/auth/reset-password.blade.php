@extends('layouts.fo')

@section('content')
    <h1>Redifinição de Palavra-passe</h1>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label" >Email address</label>
            <input readonly type="email" name="email" class="form-control" value="{{request()->email}}" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Nunca partilharemos o teu e-mail com ninguém.</div>
        </div>
        @error('email')
            <p>Email inválido</p>
        @enderror

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nova Palavra-passe</label>
            <input required type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        @error('password')
            <p>Password inválida</p>
        @enderror

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirmação da Nova Palavra-passe</label>
            <input required type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
        </div>
        @error('password')
            <p>Password inválida</p>
        @enderror
        <input type="hidden" name="token" value="{{ request()->route('token') }}">
        <button type="submit" class="btn-solid theme-primary">Submeter nova Palavra-passe</button>
    </form>
@endsection
