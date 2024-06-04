<?php

namespace App\Http\Controllers;

use App\Models\auteurs;
use App\Models\livres;
use Illuminate\Http\Request;

class BibliothequeController extends Controller
{
    public function affichlivr(){
        // $livres = livres::all();
        $livres = livres::paginate(10);
        return view("Livres.accueil",compact("livres"));
    }
    public function create(){
        $auteurs = auteurs::all();
        return view("Livres.create",compact("auteurs"));
    }
    public function ajouter(Request $request){
        $request->validate([
            "titre"=> ["required","max:20"],
            "annee_de_pub"=> ["required"],
            "nombre_de_page"=> ["required"],
            "auteur_id"=> ["required"]
        ]);
        $livres= new livres();
        
        $livres->titre=$request->input("titre");
        $livres->annee_de_pub=$request->input("annee_de_pub");
        $livres->nombre_de_page=$request->input("nombre_de_page");
        $livres->auteur_id=$request->input("auteur_id");

        $livres->save();
        return redirect("/")->with("siccess","Livre Ajouté avec succès");
    }
    public function update($id){
        $livres = livres::findOrFail($id);
        return view("Livres.update",compact("livres"));
    }
    public function modifier(Request $request,$id){
        $request->validate([
            "titre"=> ["required","max:20"],
            "annee_de_pub"=> ["required"],
            "nombre_de_page"=> ["required"],
            "auteur_id"=> ["required"]
        ]);
        $livres = livres::findOrFail($id);
        $livres->titre=$request->get("titre");
        $livres->annee_de_pub=$request->get("annee_de_pub");
        $livres->nombre_de_page=$request->get("nombre_de_page");
        $livres->auteur_id=$request->get("auteur_id");
        $livres->update();
        return redirect("/")->with("success","Livre est Modifier avec succès");
    }

    public function delete($id){
        $livres = livres::findOrFail($id);
        $livres->delete();
        return redirect("/")->with("success","Livre est deleted avec succès");
    }
    public function deleteToute(){
        livres::truncate();
        return redirect("/")->with("success","Tout Livre est deleted avec succès");
    }
    public function recherche(Request $request)
    {
        $titre = $request->input('titre');
        $livres = livres::where('titre', $titre)->first();
        if ($livres) {
            return redirect('/')->with('success', 'Le titre existe');
        } else {
            return redirect('/')->with('ereur', 'Livre not found');
        }
    }


}
