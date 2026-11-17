<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    function allTasks()
    {
        $tasksFromDB = $this->getAllTasks();

        Task::STATUS_COMPLETED;
        Task::STATUS_NOTDONE;

        return view('tasks.allTasks', compact('tasksFromDB'));
    }

    protected function getAllTasks()
    {
        $getAllTasks = Task::join('users', 'tasks.user_id', '=', 'users.id')
            ->select('tasks.id', 'tasks.name as task_name', 'tasks.due_at', 'tasks.status', 'users.name as user_name')
            ->get();

        return $getAllTasks;
    }

    public function addTasks()
    {
        $usersFromDB = $this->getAllUsers();

        return view('tasks.addtasks', compact('usersFromDB'));
    }

    private function getAllUsers()
    {
        $users = User::select('id', 'name')->get();

        return $users;
    }

    public function storeTask(Request $request)
    {
        // dd($request->all());
        // validar os dados no servidor
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|min:10',
            'user_id' => 'required|exists:users,id'
        ]);

        // depois de validados, inserir na bd
        DB::table('tasks')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('tasks.all')->with('message', 'Tarefa adicionada com sucesso!');
    }


    public function deleteTasks(int $id)
    {
        Task::where('tasks.id', $id)->delete();
        return back();
    }

    public function editTasks(int $id)
    {
        $taskInfo = Task::where('tasks.id', $id)
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->select('tasks.id', 'tasks.name as task_name', 'tasks.due_at', 'tasks.status', 'users.name as user_name')
            ->first();

        return view('tasks.edittask', compact('taskInfo'));
    }
}
