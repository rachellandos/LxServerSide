<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function allUsers()
    {
        $usersWDB = $this->loadUsersWDB();

        $searchPar = request()->query('search') ? request()->query('search') : null;

        $query = User::select('id', 'name', 'address', 'email', 'nif', 'photo');

        if ($searchPar) {
            $query->where('name', 'LIKE', "%{$searchPar}%")
                ->orWhere('email', 'LIKE', "%{$searchPar}%");
        }

        $usersFromDB = $query->get();

        // dd( $usersFromDB);

        return view('users.allusers', compact('usersWDB', 'usersFromDB'));
    }

    public function addUsers()
    {
        return view('users.addusers');
    }

    public function storeUser(Request $request)
    {
        // dd($request->all());
        // validar os dados no servidor
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nif' => 'required',
        ]);

        // depois de validados, inserir na bd
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nif' => $request->nif,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('users.all')->with('message', 'Utilizador adicionado com sucesso!');
    }

    public function deleteUsers(int $id)
    {
        Task::where('user_id', $id)->delete();
        User::where('id', $id)->delete();

        return back();
    }

    public function editUsers(int $id)
    {
        $userInfo = User::where('id', $id)->select('name', 'email', 'id', 'address', 'nif', 'photo')->first();

        return view('users.edituser', compact('userInfo'));
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'photo' => 'image'
        ]);

        if ($request->hasFile('photo')) {
            //armazenar no storage e guarda o caminho numa var
            $photo = Storage::putFile('userPhotos', $request->photo);
        }

        User::where('id', $request->id)->update([
            'name' => $request->name,
            'address' => $request->address,
            'nif' => $request->nif,
            'photo' => isset($photo) ? $photo : null,
            'updated_at' => now(),
        ]);

        return redirect()->route('users.all')->with('message', 'User actualizado com sucesso!');
    }

    private function loadUsersWDB()
    {
        $usersWithoutDB = [
            ['id' => 1, 'name' => 'Sara', 'email' => 'sara@gmail.com'],
            ['id' => 2, 'name' => 'Bruno', 'email' => 'Bruno@gmail.com'],
            ['id' => 3, 'name' => 'Marco', 'email' => 'Marco@gmail.com'],
            ['id' => 4, 'name' => 'António', 'email' => 'António@gmail.com'],
        ];

        return $usersWithoutDB;
    }
}
