<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="container">

        {{-- filter --}}
        <div class="w-full ">
            <form method="GET" action="{{ route('dishes.index') }}">
                @csrf
                <div class="filter flex flex-col  md:flex-row md:items-end space-x-2">
                    {{-- categoria --}}
                    <div class="filter-field">
                        <label for="category_id">
                            Categoria
                        </label>
                        <x-forms.inputs.select
                            name="category_id"
                            :options="$categories"
                            :first-option="'Scegli categoria'"
                        />
                    </div>

                    {{-- ricerca per nome --}}
                    <div class="filter-field ">
                        <label for="filter">
                            Nome
                        </label>

                        <x-forms.inputs.text name="filter" />
                    </div>


                    {{-- Pulsante invio --}}
                    <div class=" md:w-auto">
                        <button type="submit" class="w-full md:w-auto inline-flex items-center justify-center px-4 py-2 mt-1 md:mt-0 bg-indigo-600 text-white font-medium text-sm rounded-md shadow hover:bg-indigo-700 transition">
                            Filtra
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-4">
            {{-- dishes --}}
            <x-dashboard-dropdown
                :list="$dishes"
                :type="'dishes'"
                :name="'Piatti'"
            />

            {{-- categories --}}
            <x-dashboard-dropdown
                :list="$categories"
                :type="'categories'"
                :name="'Categorie'"
            />

            {{-- ingredients --}}
            <x-dashboard-dropdown
                :list="$ingredients"
                :type="'ingredients'"
                :name="'Ingredienti'"
            />
        </div>
    </div>
</x-app-layout>
