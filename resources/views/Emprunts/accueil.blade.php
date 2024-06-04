
@extends('Auteurs.LayoutAu.app')
@section('one')
    <div class="mt-4">
        <h1 class="pb-2 text-gray-400 font-bold text-center">Liste des Emprunt</h1>
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
        @if ($Emprunt->count() > 0)
        <table class="table table-striped table-dark text-center">
            <thead>
                <tr>
                    <th scope="col">livre_id</th>
                    <th scope="col">date_de_emprunte</th>
                    <th scope="col">date_de_retour</th>
                    <th scope="col">Les Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Emprunt as $Emprunt)
                    <tr>
                        <td>{{ $Emprunt->livre_id }}</td>
                        <td>{{ $Emprunt->date_de_emprunte }}</td>
                        <td>{{ $Emprunt->date_de_retour }}</td>
                        <td>
                            <a href="{{ url('updateemp/' . $Emprunt->id) }}"
                                class=" p-1 rounded-md  border-yellow-400  px-2 text-yellow-400 border">Modifier</a>
                            <form class="inline" action="{{ url('deleteemp/' . $Emprunt->id) }}" method="post">
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
        <p class="h-40 bg-green-100 text-5xl flex items-center justify-center rounded-md border-2">Aucane Emprunt!!!</p>
        @endif
    </div>
@endsection

