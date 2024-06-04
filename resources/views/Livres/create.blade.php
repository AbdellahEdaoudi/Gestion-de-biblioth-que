@extends('Livres.LayoutL.app')
@section('one')

    <div>
        <h1 class="text-center text-2xl text-red-800 my-2 font-medium">Nouvaeu Livre : </h1>
        {{-- EREUR --}}
        @if ($message = Session::get('ereur'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
        {{-- SECCESS --}}
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('ajouter') }}" method="POST">
            @csrf
            <table class="flex justify-center bg-gray-100 py-10 rounded-md mb-2">
                <tr>
                    <td class="">titre de Livre : </td>
                    <td>
                        <input name="titre" type="text" class="border p-2 w-96 ml-10 rounded-md ">
                    </td>
                </tr>
                <tr>
                    <td class="">annee_de_pub :</td>
                    <td>
                        <input name="annee_de_pub" type="date" class="border p-2 w-96 ml-10 rounded-md">
                    </td>
                </tr>
                <tr>
                    <td class="">nombre_de_page :</td>
                    <td>
                        <input name="nombre_de_page" type="number" class="border p-2 w-96 ml-10 rounded-md ">
                    </td>
                </tr>
                <tr>
                    <td class="">auteur :</td>
                    <td>
                        <select  class="border p-2 w-96 ml-10 rounded-md " name="auteur_id">
                            <option value=""></option>
                            @foreach ($auteurs as $auteur)
                                <option value="{{ $auteur->id }}">
                                    {{$auteur->nom}} {{$auteur->prenom}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" class="p-2 bg-blue-500 rounded-md w-full text-white">Ajouter</button>
        </form>
    </div>
@endsection
