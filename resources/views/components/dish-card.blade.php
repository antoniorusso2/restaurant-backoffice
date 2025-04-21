<div class="card p-4 border rounded-md min-h-56 flex flex-col">
    <div class="card-head">
        <h3 class="text-2xl font-semibold">{{ $dish->name }}</h3>
    </div>
    <div class="card-body flex-grow flex flex-col items-start">

        {{-- dishes tags and categories --}}
        <div class="categories badge p-1 border rounded my-2" style="background-color: {{ $dish->category->color }}">
            <span class="text-sm font-thin">{{__('categories.' . $dish->category->name)}}</span>
        </div>
        <a class="btn special mt-auto self-end" href="{{ route('dishes.show', $dish) }}">Dettagli</a>
    </div>
</div>