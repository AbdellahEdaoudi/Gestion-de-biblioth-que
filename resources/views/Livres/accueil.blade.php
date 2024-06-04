@extends('Livres.LayoutL.app')
@section('one')
    <div class="mt-1 border-4 p-1">
        <h1 class="pb-2 text-gray-400 font-bold text-center">Liste des Livre</h1>
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
        @if ($livres->count() > 0)
        <div>
            <table class="table table-striped table-dark text-center">
                <thead>
                    <tr>
                        <th scope="col">titre</th>
                        <th scope="col">annee_de_pub</th>
                        <th scope="col">nombre_de_page</th>
                        <th scope="col">auteur by id</th>
                        <th scope="col">Les Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($livres as $livre)
                        <tr>
                            <td>{{ $livre->titre }}</td>
                            <td>{{ $livre->annee_de_pub }}</td>
                            <td>{{ $livre->nombre_de_page }}</td>
                            <td>{{ $livre->auteur->nom ?? "Aucain"}}</td>
                            <td>
                                <a href="{{ url('update/' . $livre->id) }}"
                                    class=" p-1 rounded-md  border-yellow-400  px-2 text-yellow-400 border">Modifier</a>
                                <form class="inline" action="{{ url('delete/' . $livre->id) }}" method="post">
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
            {{-- {{ $livres->links() }} --}}
        </div>
        @else
        <p class="h-40 bg-green-50 text-5xl flex items-center justify-center rounded-md border-2">
            Aucane Livre!!!
        </p>
        @endif
    </div>
@endsection
