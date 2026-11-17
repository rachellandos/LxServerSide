@extends('layouts.fo')

@section('content')
    <h3>Detalhes da prenda 🎁</h3>
    <p><b>Nome: </b>{{ $giftInfo->gift_name }}</p>
    <p><b>Valor Previsto (€): </b>{{ $giftInfo->budgetedValue }}</p>
    <p><b>Valor gasto (€): </b>{{ $giftInfo->spentValue }}</p>
    <p><b>Nome da Pessoa: </b>{{ $giftInfo->user_name }}</p>

    <h3>Editar Prenda </h3>
    <form method="POST" action="{{ route('gifts.update') }}">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{ $giftInfo->id }}">
        <div class="mb-3">
            <label for="gift_name" class="form-label">Nome da Prenda</label>
            <input type="text" name="gift_name" class="form-control" id="gift_name" aria-describedby="giftNameHelp"
                value="{{ $giftInfo->gift_name }}">
            @error('name')
                <p class="fg-danger">Nome inválido.</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="budgetedValue" class="form-label">Valor Previsto (€)</label>
            <input type="text" disabled name="budgetedValue" class="form-control" id="budgetedValue"
                aria-describedby="budgetedValueHelp" value="{{ $giftInfo->budgetedValue }}">
            @error('budgetedValue')
                <p class="fg-danger">Valor inválido</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="spentValue" class="form-label">Valor Gasto (€)</label>
            <input type="text" name="spentValue" class="form-control" id="spentValue" aria-describedby="spentValueHelp"
                value="{{ $giftInfo->spentValue }}">
            <div id="spentValueHelp" class="form-text">Introduzir só o valor.</div>
            @error('spentValue')
                <p class="fg-danger">Valor inválido</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Nome da Pessoa</label>
            <div>
                <select name="user_id" class="form-select form-control">
                    <option value="{{ $giftInfo->user_id }}" selected>{{ $giftInfo->user_name }}</option>
                    @foreach ($usersFromDB as $user)
                        @if ($user->id != $giftInfo->user_id)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            @error('user_id')
                <p class="fg-danger">Nome da Pessoa inválido</p>
            @enderror
        </div>

        <button type="submit" class="btn-solid theme-accent">Submit</button>
    </form>
@endsection
