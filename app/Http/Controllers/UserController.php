<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addUser(){

        return redirect()->route('register');
    }

    public function listUser(Guard $auth){

        $user = User::find($auth->id());
        if($user->categorie_id != 1){

            return redirect()->route('home');
        }

        $datas = User::get();
        return view('user.list', compact('datas'));
    }

    public function desableUser($id){

        $data = User::find($id);
        $data->statut = 0;
        $data->save();

        return redirect()->route('list.user')->with('success', 'Utilisateur desactivé avec succès');
    }

    public function enableUser($id){

        $data = User::find($id);
        $data->statut = 1;
        $data->save();

        return redirect()->route('list.user')->with('success', 'Utilisateur activé avec succès');
    }

    public function deleteUser($id){

        $data = User::find($id);
        $data->delete();

        return redirect()->route('list.user')->with('success', 'Utilisateur supprimé avec succès');
    }

    public function editUser($id){

        $cats = Categorie::get();

        $data = User::find($id);

        return view('user.edit', compact('data', 'cats'));
    }

    public function updateUser(Request $request, $id){

        $data = User::find($id);

        $data->name = $request->input('name');
        $data->mobile = $request->input('mobile');
        $data->email = $request->input('email');
        $data->sender_id = $request->input('sender_id');
        $data->categorie_id = $request->input('categorie_id');

        $data->save();

        return redirect()->route('list.user')->with('success', 'Utilisateur modifié avec succès');

    }

    // admin

    public function addAdmin($id){

        $data = User::find($id);
        $data->categorie_id = 1;
        $data->save();

        return redirect()->route('list.user')->with('success', 'Utilisateur ajouté comme administrateur');
    }

    public function delAdmin($id){

        $data = User::find($id);
        $data->categorie_id = 2;
        $data->save();

        return redirect()->route('list.user')->with('success', 'Utilisateur supprimé comme administrateur');
    }
}
