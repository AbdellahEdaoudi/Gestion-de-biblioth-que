@extends('Auteurs.LayoutAu.app')

@section('one')

    <div>
        <h1 class="text-center text-2xl text-red-800 my-2 font-medium">Nouvaeu Auteur : </h1>
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
        <form action="{{ url('ajouteraut') }}" method="POST">
            @csrf
            <table class="flex justify-center bg-gray-100 py-10 rounded-md mb-2">
                <tr>
                    <td class="">nom : </td>
                    <td>
                        <input name="nom" type="text" class="border p-2 w-96 ml-10 rounded-md ">
                    </td>
                </tr>
                <tr>
                    <td class="">prenom :</td>
                    <td>
                        <input name="prenom" type="text" class="border p-2 w-96 ml-10 rounded-md">
                    </td>
                </tr>
            </table>
            <button type="submit" class="p-2 bg-blue-500 rounded-md w-full text-white">Ajouter</button>
        </form>

    </div>
@endsection
