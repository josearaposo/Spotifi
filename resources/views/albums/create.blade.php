<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('albums.store') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <x-input-label for="titulo" :value="'Título del Album'" />
                <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')"
                    required autofocus autocomplete="titulo" />
                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="artistas[]" :value="'Artistas:'" />
                @foreach ($artistas as $artista)
                <input type="checkbox" id="artistas"
                    class="flex p-2.5  text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="artistas[]" value="{{ $artista->id }}"/><span>{{$artista->nombre}}</span> <br>
                @endforeach
                <x-input-error :messages="$errors->get('artistas[]')" class="mt-2" />
            </div><br>

            <div>
                <x-input-label for="cancions[]" :value="'Canciones:'" />
                @foreach ($cancions as $cancion)
                <input type="checkbox" id="cancions"
                    class="flex p-2.5  text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="cancions[]" value="{{ $cancion->id }}"/><span>{{$cancion->titulo}}</span> <br>
                @endforeach
                <x-input-error :messages="$errors->get('cancions[]')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="foto" :value="'Imagen del Album'" />
                <x-text-input id="foto" class="block mt-1 w-full"
                    type="file" name="foto" :value="old('foto')" required
                    autofocus autocomplete="foto" />
                <x-input-error :messages="$errors->get('foto')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('albums.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Insertar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
