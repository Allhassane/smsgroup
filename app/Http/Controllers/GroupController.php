<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Groupe;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
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

    public function add(){

        return view('group.add');
    }

    public function create(Request $request, Guard $auth){

        $validator = Validator::make($request->all(), [
            'libelle' => 'required|max:255|unique:groupes'
        ]);

        if ($validator->fails()){
            return redirect()->route('add.group')->withInput()->withErrors($validator);
        }else{

            Groupe::create([
                'libelle' => $request->input('libelle'),
                'statut' => 1,
                'user_id' => $auth->id()
            ]);
        }

        return redirect()->route('list.group')->with('success', 'Groupe créer avec succès');
    }

    public function liste(Guard $auth){

        $datas = Groupe::where('user_id', $auth->id())->OrderBy('id', 'desc')->get();

        return view('group.list', compact('datas'));
    }

    public function desable($id){

        $data = Groupe::find($id);
        $data->statut = 0;
        $data->save();

        return redirect()->route('list.group')->with('success', 'Groupe désactivé avec succès');
    }

    public function enable($id){

        $data = Groupe::find($id);
        $data->statut = 1;
        $data->save();

        return redirect()->route('list.group')->with('success', 'Groupe activé avec succès');
    }

    public function edit($id){

        $data = Groupe::find($id);

        return view('group.edit', compact('data'));
    }

    public function update(Request $request, $id){

        $data = Groupe::find($id);

        $data->libelle = $request->input('libelle');
        $data->save();

        return redirect()->route('list.group')->with('success', 'Groupe Modifié avec succès');
    }

    public function delete($id){

        Groupe::find($id)->delete();

        return redirect()->route('list.group')->with('success', 'Groupe supprimé avec succès');
    }

    public function groupContact($id, Guard $auth){

        $datas = DB::table('groupes')
            ->join('contact_groupe', 'groupes.id', '=', 'contact_groupe.groupe_id')
            ->join('contacts', 'contact_groupe.contact_id', '=', 'contacts.id')
            ->where('groupes.id', $id)
            ->get();

        $group = Groupe::find($id);

        $contacts = Contact::where('user_id', $auth->id())->get();

        return view('group.contact', compact('datas', 'group', 'contacts'));
    }

    public function deleteOnGroupe($contact_id, $groupe_id){

        $detach_contact = Contact::find($contact_id);

        $detach_contact->groupes()->detach([$detach_contact->id, $groupe_id]);

        return redirect()->route('groupe.contact', ['id' => $groupe_id])->with('success', 'Vous avez supprimé '.$detach_contact->name. ' du groupe');
    }

    public function addContactInGroup(Request $request, $id){

        $nombre_contact_ajoute = count($request->input('contact_id'));

        foreach ($request->input('contact_id') as $contact){

            $attach_contact = Contact::find($contact);

            $attach_contact->groupes()->attach($id);
        }

        return redirect()->route('groupe.contact', ['id' => $id])->with('success', 'Vous avez ajouté '.$nombre_contact_ajoute.' contacts à votre groupe');
    }
}
