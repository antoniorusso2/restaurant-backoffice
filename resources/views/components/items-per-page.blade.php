@props(['limits', 'selected'])

<form class="flex sm:flex-row flex-wrap p-2 rounded-md items-center justify-start gap-4 sm:justify-end" {{ $attributes->merge(['class' => 'form-select']) }}>
    <label for="limit" class="font-semibold">Elementi per pagina</label>
    <select
        class=" flex-1 sm:flex-none sm:w-14 border-2 rounded-md bg-slate-700 focus:outline-offset-1 focus:outline-indigo-400 focus:text-gray-900 dark:focus:bg-gray-50 dark:text-gray-50 block p-2"
        name="limit"
        id="limit"
    >
        @foreach ($limits as $limit)
            <option value="{{ $limit }}" @selected($limit == $selected)>{{ $limit }}</option>
        @endforeach
    </select>

    <button class="btn special" type="submit">Applica</button>
</form>
