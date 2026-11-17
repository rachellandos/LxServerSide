@php

@endphp

@extends('layouts.fo')

@section('content')
    <h1>Aqui vamos carregar todas as tarefas</h1>
    @if (session('message'))
        <div class="alert theme-success">{{ session('message') }}</div>
    @endif
    <a class="btn-solid theme-warning" href=" {{route('tasks.add')}} ">Adicionar Tarefa</a>
    <h4>Listagem de tarefas:</h4>
    <table class="table theme-accent">
        <thead>
            <tr>
                <th scope="col">Tarefa</th>
                <th scope="col">Estado</th>
                <th scope="col">Data de Conclusão</th>
                <th scope="col">Responsável</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasksFromDB as $task)
                <tr>
                    <td>{{ $task->task_name }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->due_at }}</td>
                    <td>{{ $task->user_name }}</td>
                    <td><a href="{{ route('tasks.delete', $task->id) }}" class="btn-solid theme-danger">Apagar</a></td>
                    <td><a href="{{ route('tasks.edit', $task->id) }}" class="btn-solid theme-info">Ver/Editar</a></td>
                </tr>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
