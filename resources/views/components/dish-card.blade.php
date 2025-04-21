<div class="card p-4 border rounded-md min-h-56 flex flex-col">
    <div class="card-head">
        <h3 class="text-2xl font-semibold">{{ $dish->name }}</h3>
    </div>
    <div class="card-body self-end flex-grow flex flex-col">

        {{-- dishes tags and categories --}}
        <div class="categories">
            {{$dish->category}}
        </div>

        <a class="btn special mt-auto" href="{{ route('dishes.show', $dish) }}">Dettagli</a>
    </div>
</div>