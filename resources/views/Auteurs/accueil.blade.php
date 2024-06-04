@extends('Auteurs.LayoutAu.app')
@section('one')
    <div class="mt-4">
        <h1 class="pb-2 text-gray-400 font-bold text-center">Liste des Auteur</h1>
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
        @if ($auteurs->count() > 0)
        <table class="table table-striped table-dark text-center">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Les Opiration</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($auteurs as $auteurs)
                    <tr>
                        <td>{{ $auteurs->nom }}</td>
                        <td>{{ $auteurs->prenom }}</td>
                        <td>
                            <a href="{{ url('updateaut/' . $auteurs->id) }}"
                                class=" p-1 rounded-md  border-yellow-400  px-2 text-yellow-400 border">Modifier</a>
                            <form class="inline" action="{{ url('delete/' . $auteurs->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button
                                    class=" p-1 rounded-md border-red-500 px-2 text-red-500 border">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        @else
        <p class="h-40 bg-green-100 text-5xl flex items-center justify-center rounded-md border-2">Aucane Auteur!!!</p>
        @endif
    </div>
@endsection
