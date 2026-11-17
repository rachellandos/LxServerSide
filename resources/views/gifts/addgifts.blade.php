@extends('layouts.fo')

@section('content')
    <h1>Adicionar Prenda de Natal</h1>

    <form method="POST" action="{{ route('gifts.store') }}">
        @csrf
        <div class="mb-3">
            <label for="gift_name" class="form-label">Nome da Prenda</label>
            <input type="text" name="gift_name" class="form-control" id="gift_name" aria-describedby="giftNameHelp">
            @error('name')
                <p class="fg-danger">Nome inválido.</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="budgetedValue" class="form-label">Valor Previsto (€)</label>
            <input type="text" name="budgetedValue" class="form-control" id="budgetedValue"
                aria-describedby="budgetedValueHelp">
            <div id="budgetedValueHelp" class="form-text">Introduzir só o valor.</div>
            @error('budgetedValue')
                <p class="fg-danger">Valor inválido</p>
            @enderror
        </div>
                <div class="mb-3">
            <label for="spentValue" class="form-label">Valor Gasto (€)</label>
            <input type="text" name="spentValue" class="form-control" id="spentValue"
                aria-describedby="spentValueHelp">
                <div id="spentValueHelp" class="form-text">Introduzir só o valor.</div>
            @error('spentValue')
                <p class="fg-danger">Valor inválido</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">Nome da Pessoa</label>
            <div>
                <select name="user_id" class="form-select form-control" aria-label="Default select example">
                    <option selected>Abrir o menu</option>
                    @foreach ($usersFromDB as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('user_id')
                <p class="fg-danger">Nome da Pessoa inválido</p>
            @enderror
        </div>

        <button type="submit" class="btn-solid theme-primary">Submit</button>
    </form>
@endsection
