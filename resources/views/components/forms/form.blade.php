<form class="flex flex-col gap-4 w-full mx-auto justify-center items-start" action="{{ $action }}" method="{{ $method }}">
    @csrf
    @foreach ($fields as $field)
        <div class=" form_section text-lg text-gray-900 dark:text-white bg-slate-800 w-full py-2 px-4 rounded-md drop-shadow-xl flex items-center flex-wrap">
            {{-- label --}}
            <x-forms.input-label class="my_label" for="{{ $field['name'] }}">
                {{ $field['label'] }}
            </x-forms.input-label>

            {{-- input --}}
            <x-forms.input :id="$field['name']" :name="$field['name']" :type="$field['type']" :value="$field['value'] ?? ''" />

            {{-- error message --}}
            <x-forms.input-error class="mt-2" :messages="$errors->get($field['name'])" />
        </div>
    @endforeach

    <button class="btn special self-end" type="submit">Invia</button>
</form>
