<x-app-layout>
    <div class="container">
        <div class="flex gap-4 w-full justify-start flex-wrap">
            <a class="btn special" href="{{ route('categories.index') }}">Indietro</a>
            <a class="btn special" href="{{ route('categories.edit', $category) }}">Modifica</a>

            {{-- delete --}}
            <button class="btn special delete md:ms-auto" id="modal-trigger">Elimina</button>
        </div>
    </div>

    <div class="container">
        <h1 class="text-4xl">{{ $category->name }}</h1>
        <div class="badge my-4 text-xl flex gap-4">
            Colore: <span class="block badge p-3 w-16" style="background-color: {{ $category->color }}"></span>
        </div>
    </div>

    {{-- modal --}}
    <div id="modal"
        class="modal-overlay z-10 bg-gray-600 bg-opacity-50 backdrop-filter backdrop-blur h-dvh fixed inset-0 hidden">
        <div class="modal-content bg-opacity-50 p-4 flex flex-col justify-center items-center h-full gap-y-5">
            <h2 class="text-3xl">Sei sicuro di voler eliminare questa categoria?</h2>
            <p class="">Categoria: <span class="font-semibold">{{ $category->name }}</span></p>
            <p class="texct-thin text-rose-700 uppercase">Una volta eliminata non sarà più disponibile!</p>
            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="mt-4 w-full">
                @csrf
                @method('DELETE')
                <button class="btn special delete w-44 mx-auto" type="submit">Elimina</button>
            </form>
        </div>
        {{-- x close icon --}}
        <div id="modal-close" class="cursor-pointer absolute top-4 right-4 p-1 border rounded-md bg-rose-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </div>
</x-app-layout>