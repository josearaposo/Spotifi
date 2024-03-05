<div class="relative overflow-x-auto w-7/8 mx-auto shadow-md sm:rounded-lg">
    <input wire:model.live="busqueda" class="flex justify-center mt-4 mb-4">

{{--     <table class="">
        <thead>
            <th>Artista</th>
        </thead>
        <tbody>
            @foreach ($artistas as $artista)
                <tr>
                    <td>{{ $artista->nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3" colspan="2">
                    Acción
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artistas as $artista)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a class="text-blue-500 blue" href="{{ route('artistas.show', $artista) }}">
                            {{$artista->nombre }}
                        </a>
                    </th>
                    <td class="px-6 py-4">
                        <a href="{{ route('artistas.edit', ['artista' => $artista]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <x-primary-button>
                                Editar
                            </x-primary-button>
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('artistas.destroy', ['artista' => $artista]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-primary-button class="bg-red-500">
                                Borrar
                            </x-primary-button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form wire:submit="insertar" class="flex justify-center mt-4 mb-4">
        <input type="text" id="campo" wire:model="campo">
        <x-primary-button  class="bg-green-500 mb-2" type="submit">Añadir</x-primary-button>
    </form>
{{--     <form action="{{ route('companyas.create') }}" class="flex justify-center mt-4 mb-4">
        <x-primary-button class="bg-green-500 mb-2">Insertar nuevo Artista</x-primary-button>
    </form> --}}
</div>
