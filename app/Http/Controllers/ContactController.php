<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Groupe;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
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

    public function add(Guard $auth){

        $datas = Groupe::where('user_id', $auth->id())
            ->where('statut', 1)
            ->get();

        if(count($datas) == 0){
            return redirect()->route('add.group')->with('warning', 'Veuillez créer un groupe avant de créer un contact');
        }else{
            return view('contact.add', compact('datas'));
        }

    }

    public function create(Request $request, Guard $auth){

        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'mobile' => 'required|max:255|unique:contacts',
            'groupe_id' => 'required'
        ]);

        if ($validator->fails()){
            return redirect()->route('add.contact')->withInput()->withErrors($validator);
        }else{

            $data = array(
                'name' => $request->input('name'),
                'mobile' => $request->input('mobile'),
                'statut' => 1,
                'user_id' => $auth->id(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );

            $new_insert_contact = Contact::insertGetId($data);

            $asso_contact_group = Contact::find($new_insert_contact);
            $asso_contact_group->groupes()->attach($request->input('groupe_id'));
        }

        return redirect()->route('list.contact')->with('success', 'Contact créer avec succès');
    }

    public function liste(Guard $auth)
    {

        $datas = Contact::where('user_id', $auth->id())->OrderBy('id', 'desc')->get();

        $groups = Groupe::where('user_id', $auth->id())->get();

        return view('contact.list', compact('datas', 'groups'));
    }

    public function edit($id){

        $data = Contact::find($id);

        return view('contact.edit', compact('data'));
    }

    public function update(Request $request, $id){

        $data = Contact::find($id);

        $data->name = $request->input('name');
        $data->mobile = $request->input('mobile');
        $data->save();

        return redirect()->route('list.contact')->with('success', 'Contact Modifié avec succès');
    }

    public function delete($id){

        $detach_contact = Contact::find($id);
        $detach_contact->groupes()->detach([$detach_contact->id, $id]);

        Contact::find($id)->delete();

        return redirect()->route('list.contact')->with('success', 'Contact supprimé avec succès');
    }

    public function chooseContactGroup(Request $request, $id){

        $nombre_groupe_ajoute = count($request->input('groupe_id'));

        foreach ($request->input('groupe_id') as $groupe){

            $attach_groupe = Groupe::find($groupe);

            $attach_groupe->contacts()->attach($id);
        }

        return redirect()->route('list.contact')->with('success', 'Contact ajouté à '. $nombre_groupe_ajoute. ' groupes');
    }
}
