@extends('Livres.LayoutL.app')
@section('one')
    <div>
        <h1 class="text-center text-2xl text-red-800 my-2 font-medium">Modificatino Stagiaire : </h1>
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
        <form action="{{ url('modifier/' . $livres->id) }}" method="post">
            @csrf
            @method('PATCH')
            <table class="flex justify-center bg-gray-100 py-10 rounded-md mb-2">
                <tr>
                    <td class="">titre de Livre : </td>
                    <td>
                        <input name="titre" type="text"  value="{{ $livres->titre }}"  class="border p-2 w-96 ml-10 rounded-md ">
                    </td>
                </tr>
                <tr>
                    <td class="">annee_de_pub :</td>
                    <td>
                        <input name="annee_de_pub" type="date" value="{{ $livres->annee_de_pub }}"   class="border p-2 w-96 ml-10 rounded-md">
                    </td>
                </tr>
                <tr>
                    <td class="">nombre_de_page :</td>
                    <td>
                        <input name="nombre_de_page" type="number" value="{{ $livres->nombre_de_page }}" class="border p-2 w-96 ml-10 rounded-md ">
                    </td>
                </tr>
                <tr>
                    <td class="">auteur_id:</td>
                    <td>
                        <input name="auteur_id" type="number" value="{{ $livres->auteur_id }}"   class="border p-2 w-96 ml-10 rounded-md ">
                    </td>
                </tr>
            </table>
            <button type="submit" class="p-2 bg-blue-500 rounded-md w-full text-white">Enregistrer</button>
        </form>


    </div>
@endsection
