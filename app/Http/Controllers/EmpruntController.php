<?php

namespace App\Http\Controllers;

use App\Models\emprunts;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    public function affichemp(){
        // $Emprunt = emprunts::all();
        $Emprunt = emprunts::paginate(10);
        return view("Emprunts.accueil",compact("Emprunt"));
    }
    public function create(){
        return view("Emprunts.create");
    }
    public function ajouter(Request $request){
        $request->validate([
            "livre_id"=> ["required"],
            "date_de_emprunte"=> ["required"],
            "date_de_retour"=> ["required"],
        ]);
        $Emprunt= new emprunts();
        $Emprunt->livre_id=$request->input("livre_id");
        $Emprunt->date_de_emprunte=$request->input("date_de_emprunte");
        $Emprunt->date_de_retour=$request->input("date_de_retour");
        $Emprunt->save();
        return redirect("/Emprunt")->with("siccess","Emprunt Ajouté avec succès");
    }
    public function update($id){
        $Emprunt = emprunts::findOrFail($id);
        return view("Emprunts.update",compact("Emprunt"));
    }
    public function modifier(Request $request,$id){
        $request->validate([
            "livre_id"=> ["required"],
            "date_de_emprunte"=> ["required"],
            "date_de_retour"=> ["required"],
        ]);
        $Emprunt = emprunts::findOrFail($id);
        $Emprunt->livre_id=$request->get("livre_id");
        $Emprunt->date_de_emprunte=$request->get("date_de_emprunte");
        $Emprunt->date_de_retour=$request->get("date_de_retour");
        $Emprunt->update();
        return redirect("/Emprunt")->with("success","Emprunt est Modifier avec succès");
    }

    public function delete($id){
        $Emprunt = emprunts::findOrFail($id);
        $Emprunt->delete();
        return redirect("/Emprunt")->with("success","Emprunt est deleted avec succès");
    }
    public function recherche(Request $request)
    {
        $livre_id = $request->input('livre_id');
        $Emprunt = emprunts::where('livre_id', $livre_id)->first();
        if ($Emprunt) {
            return redirect('/Emprunt')->with('success', 'Emprunt existe');
        } else {
            return redirect('/Emprunt')->with('ereur', 'Emprunt not found');
        }
    }
}
