<div class="card p-4 border rounded-md min-h-56 flex flex-col">
    <div class="card-head">
        <h3 class="text-2xl font-semibold">{{ __('categories.' . $category->name) }}</h3>
    </div>
    <div class="card-body self-end flex-grow flex flex-col">
        <p class="overflow-hidden text-ellipsis h-25">{{ $category->description }}</p>
        <a class="btn special mt-auto" href="{{ route('categories.show', $category) }}">Dettagli</a>
    </div>
</div>