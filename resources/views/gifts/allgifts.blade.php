@php

@endphp

@extends('layouts.fo')

@section('content')
    <h1>🎄 Prendas de Natal 🎅🏽</h1>
    @if (session('message'))
        <div class="alert theme-success">{{ session('message') }}</div>
    @endif
    <div class="py-3"></div>
    <a class="btn-solid theme-warning" href=" {{ route('gifts.add') }} ">Adicionar Prendas</a>
    <div class="py-3"></div>
    <h4>Listagem de Prenda:</h4>
    <table class="table theme-accent">
        <thead>
            <tr>
                <th scope="col">Prenda</th>
                <th scope="col">Valor Previsto (€)</th>
                <th scope="col">Valor Gasto (€)</th>
                <th scope="col">Diferença Valores</th>
                <th scope="col">Nome da Pessoa</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($giftsFromDB as $gift)
                <tr>
                    <td>{{ $gift->gift_name }}</td>
                    <td>{{ $gift->budgetedValue }}</td>
                    <td>{{ $gift->spentValue }}</td>
                    <td class="valueDifference">{{ $gift->valueDifference }}</td>
                    <td>{{ $gift->user_name }}</td>
                    <td><a href="{{ route('gifts.delete', $gift->id) }}" class="btn-solid theme-danger">Apagar</a></td>
                    <td><a href="{{ route('gifts.edit', $gift->id) }}" class="btn-solid theme-info">Ver/Editar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
