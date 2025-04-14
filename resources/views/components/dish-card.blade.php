<div class="card h-60 p-5 border-gray-400 border flex flex-col">
    <div class="card-head">
        <h3 class="text-2xl font-semibold">{{ $dish->name }}</h3>
    </div>
    <div class="card-body flex flex-col h-full text-nowrap">
        <p class="overflow-hidden text-ellipsis h-25">{{ $dish->description }}</p>
    </div>
    <a class="btn special align-self-end max-w-min" href="{{ route('dishes.show', $dish) }}">Dettagli</a>
</div>
