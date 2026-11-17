@extends('layouts.fo')

@section('content')
    <h1>Adicionar Tarefas</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="mb-3">
            <label for="taskName" class="form-label">Nome da tarefa</label>
            <input type="text" name="name" class="form-control" id="taskName" aria-describedby="taskNameHelp">
            @error('name')
                <p class="fg-danger">Nome inválido</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <input type="text" name="description" class="form-control" id="description"
                aria-describedby="descriptionHelp">
            <div id="descriptionHelp" class="form-text">The description must have at least 10 characters.</div>
            @error('description')
                <p class="fg-danger">Descrição inválida</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">Responsável</label>
            <div>
                <select name="user_id" class="form-select form-control" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach ($usersFromDB as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('user_id')
                <p class="fg-danger">Responsável inválido</p>
            @enderror
        </div>

        <button type="submit" class="btn-solid theme-primary">Submit</button>
    </form>
@endsection
