<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <title>TpQuerybuilde</title>
</head>

<body>
    <div class="mx-2 ">
        <h1 class="text-center text-3xl font-bold text-green-500 pt-3">Gestion de Bibliothéque</h1>
        <div class="flex justify-center border-4 bg-dark mt-4 p-2 rounded-md">
            <div class="  flex items-center rounded-md   justify-center">
                <a href="{{ url('/') }}"><button class="bg-success text-white p-2 rounded-md mr-1 ">Liste
                        Livres</button></a>
                <a href="{{ url('/create') }}"><button class="bg-primary text-white p-2 rounded-md mr-1 ">Ajouter
                        Livre</button></a>
                <a href="{{ url('/Auteurs') }}"><button class="bg-success text-white p-2 rounded-md mr-1 ">Liste
                        Auteurs</button></a>
                <a href="{{ url('/createaut') }}"><button class="bg-primary text-white p-2 rounded-md mr-1 ">Ajouter
                        Auteurs</button></a>
                <a href="{{ url('/Emprunt') }}"><button class="bg-success text-white p-2 rounded-md mr-1 ">Liste
                        Emprunt</button></a>
                <a href="{{ url('/createemp') }}"><button class="bg-primary text-white p-2 rounded-md mr-1 ">Ajouter
                        Emprunt</button></a>

                <form action="{{ url('/recherche') }}" method="post" class="flex">
                    @csrf
                    <p class=" p-2 rounded-md rounded-r-none bg-gray-200 ">Entrer le titre : </p>
                    <input
                        class="p-2 rounded-l-none rounded-md rounded-r-none
                focus:outline-none focus:border-none"
                        name="titre" placeholder="Titre de Livre" type="search">
                    <button type="submit"
                        class="bg-success text-white p-2 rounded-md rounded-l-none">Rechercher</button>
                </form>
            </div>
        </div>
        @yield('one')
    </div>
</body>

</html>
