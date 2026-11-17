<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiftController extends Controller
{
    function allGifts()
    {
        $giftsFromDB = $this->getAllGifts();


        return view('gifts.allGifts', compact('giftsFromDB'));
    }

    protected function getAllGifts()
    {
        $getAllGifts = Gift::join('users', 'gifts.user_id', '=', 'users.id')
            ->select(
                'gifts.id', 
                'gifts.name as gift_name', 
                'gifts.budgetedValue', 
                'gifts.spentValue', 
                'gifts.valueDifference', 
                'users.name as user_name')
            ->get();

        return $getAllGifts;
    }

    public function addGifts()
    {
        $usersFromDB = $this->getAllUsers();

        return view('gifts.addgifts', compact('usersFromDB'));
    }

    private function getAllUsers()
    {
        $users = User::select('id', 'name')->get();

        return $users;
    }


    public function storeGift(Request $request)
    {
        // dd($request->all());
        // validar os dados no servidor
        $request->validate([
            'gift_name' => 'required|max:50',
            'budgetedValue' => 'required|decimal:0,2|gt:0.00',
            'spentValue' => 'required|decimal:0,2|gt:0.00',
            'user_id' => 'required|exists:users,id'
        ]);

        // depois de validados, inserir na bd
        DB::table('gifts')->insert([
            'name' => $request->gift_name,
            'budgetedValue' => $request->budgetedValue,
            'spentValue' => $request->spentValue,
            'user_id' => $request->user_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('gifts.all')->with('message', 'Prenda adicionada com sucesso!');
    }

    public function deleteGifts(int $id)
    {
        Gift::where('gifts.id', $id)->delete();
        return back();
    }

    public function editGifts(int $id)
    {
        $usersFromDB = $this->getAllUsers();

        $giftInfo = Gift::where('gifts.id', $id)
            ->join('users', 'gifts.user_id', '=', 'users.id')
            ->select(
                'gifts.id',
                'gifts.name as gift_name',
                'gifts.budgetedValue',
                'gifts.spentValue',
                'gifts.user_id',
                'users.name as user_name'
            )
            ->first();

        return view('gifts.editgift', compact('giftInfo', 'usersFromDB'));
    }

    public function updateGift(Request $request)
    {
        $request->validate([
            'gift_name' => 'required|max:50',
            'spentValue' => 'required|decimal:0,2|gt:0.00',
            'user_id' => 'required|exists:users,id'
        ]);

        Gift::where('id', $request->id)->update([
            'name' => $request->gift_name,
            'spentValue' => $request->spentValue,
            'user_id' => $request->user_id,
            'updated_at' => now(),
        ]);

        return redirect()->route('gifts.all')->with('message', 'Prenda actualizada com sucesso!');
    }
}
