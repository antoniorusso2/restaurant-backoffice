<div class="card p-4 border rounded-md min-h-56">
    <div class="card-head">
        <h3 class="text-2xl font-semibold">{{ $category->name }}</h3>
    </div>
    <div class="card-body flex flex-col text-nowrap">
        <p class="overflow-hidden text-ellipsis h-25">{{ $category->description }}</p>
        <a class="btn special align-self-end max-w-min" href="{{ route('categories.show', $category) }}">Dettagli</a>
    </div>
</div>