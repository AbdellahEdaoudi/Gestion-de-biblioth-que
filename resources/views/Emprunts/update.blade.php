@extends('Auteurs.LayoutAu.app')
@section('one')
    <div>
        <h1 class="text-center text-2xl text-red-800 my-2 font-medium">Modificatino Emprunt : </h1>
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
        <form action="{{ url('modifieremp/' . $Emprunt->id) }}" method="post">
            @csrf
            @method('PATCH')
            <table class="flex justify-center bg-gray-100 py-10 rounded-md mb-2">
                <tr>
                    <td class="">livre_id : </td>
                    <td>
                        <input name="livre_id"  value="{{ $Emprunt->livre_id }}"  type="number" class="border p-2 w-96 ml-10 rounded-md ">
                    </td>
                </tr>
                <tr>
                    <td class="">date_de_emprunte :</td>
                    <td>
                        <input name="date_de_emprunte" value="{{ $Emprunt->date_de_emprunte }}"  type="date" class="border p-2 w-96 ml-10 rounded-md">
                    </td>
                </tr>
                <tr>
                    <td class="">date_de_retour :</td>
                    <td>
                        <input name="date_de_retour"  value="{{ $Emprunt->date_de_retour }}" type="date" class="border p-2 w-96 ml-10 rounded-md">
                    </td>
                </tr>
            </table>
            <button type="submit" class="p-2 bg-blue-500 rounded-md w-full text-white">Enregistrer</button>
        </form>


    </div>
@endsection
