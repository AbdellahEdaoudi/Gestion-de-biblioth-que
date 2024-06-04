<?php

namespace App\Http\Controllers;

use App\Models\auteurs;
use Illuminate\Http\Request;

class AuteursController extends Controller
{
    public function affichaut(){
        // $auteurs = auteurs::all();
        $auteurs = auteurs::paginate(10);
        return view("Auteurs.accueil",compact("auteurs"));
    }
    public function create(){
        return view("Auteurs.create");
    }
    public function ajouter(Request $request){
        $request->validate([
            "nom"=> ["required","max:15"],
            "prenom"=> ["required","max:15"],
        ]);
        $auteurs= new auteurs();
        $auteurs->nom=$request->input("nom");
        $auteurs->prenom=$request->input("prenom");
        $auteurs->save();
        return redirect("/Auteurs")->with("siccess","Auteur Ajouté avec succès");
    }
    public function update($id){
        $auteurs = auteurs::findOrFail($id);
        return view("Auteurs.update",compact("auteurs"));
    }
    public function modifier(Request $request,$id){
        $request->validate([
            "nom"=> ["required","max:15"],
            "prenom"=> ["required","max:15"],
        ]);
        $auteurs = auteurs::findOrFail($id);
        $auteurs->nom=$request->get("nom");
        $auteurs->prenom=$request->get("prenom");
        $auteurs->update();
        return redirect("/Auteurs")->with("success","Auteur est Modifier avec succès");
    }

    public function delete($id){
        $auteurs = auteurs::findOrFail($id);
        $auteurs->delete();
        return redirect("/Auteurs")->with("success","Auteur est deleted avec succès");
    }
    public function recherche(Request $request)
    {
        $nom = $request->input('nom');
        $auteurs = auteurs::where('nom', $nom)->first();
        if ($auteurs) {
            return redirect('/Auteurs')->with('success', 'Lauteur existe');
        } else {
            return redirect('/Auteurs')->with('ereur', 'Auteur not found');
        }
    }
}
