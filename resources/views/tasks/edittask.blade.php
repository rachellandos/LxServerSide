@extends('layouts.fo')

@section('content')
    <h4>Detalhes da tarefa {{ $taskInfo->task_name }}</h4>
    <p><b>Status: </b>{{$taskInfo->status}}</p>
    <p><b>Due at: </b>{{$taskInfo->due_at}}</p>
    <p><b>Responsável: </b>{{$taskInfo->user_name}}</p>
@endsection
