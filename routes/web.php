<?php

use App\Http\Controllers\AuteursController;
use App\Http\Controllers\BibliothequeController;
use App\Http\Controllers\EmpruntController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(BibliothequeController::class)->group(function(){
    Route::get("/","affichlivr");
    Route::get("/create","create");
    Route::post("/ajouter","ajouter");
    Route::get("/update/{id}","update");
    Route::patch("/modifier/{id}","modifier");
    Route::delete("/delete/{id}","delete");
    Route::post("/recherche","recherche");

});

Route::controller(AuteursController::class)->group(function(){
    Route::get("/Auteurs","affichaut");
    Route::get("/createaut","create");
    Route::post("/ajouteraut","ajouter");
    Route::get("/updateaut/{id}","update");
    Route::patch("/modifieraut/{id}","modifier");
    Route::delete("/delete/{id}","delete");
    Route::post("/rechercheaut","recherche");

});

Route::controller(EmpruntController::class)->group(function(){
    Route::get("/Emprunt","affichemp");
    Route::get("/createemp","create");
    Route::post("/ajouteremp","ajouter");
    Route::get("/updateemp/{id}","update");
    Route::patch("/modifieremp/{id}","modifier");
    Route::delete("/deleteemp/{id}","delete");
    Route::post("/rechercheemp","recherche");

});
