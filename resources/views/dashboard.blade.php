<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">

        {{-- dishes --}}
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg mb-4 cursor-pointer">
            <x-dropdown align="right" width="full" align="dashboard">
                <x-slot name="trigger">
                    <div class="trigger flex justify-between items-center text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <button class="px-3 py-2 border border-transparent ">
                            <div>Piatti</div>
                        </button>

                        <div class="ms-auto p-4">
                            <svg class="fill-current h-4 w-4" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <ul class="px-1">
                        @foreach ($dishes as $dish)
                            <li class="flex items-center border-b border-gray-500 justify-between">
                                {{-- link to show --}}
                                <x-dropdown-link :href="route('dishes.show', $dish)">{{ $dish->name }}</x-dropdown-link>

                                <div class="cta ms-auto">
                                    {{-- link to edit --}}
                                    <x-dropdown-link :href="route('dishes.edit', $dish)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </x-dropdown-link>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </x-slot>
            </x-dropdown>
        </div>

        {{-- categories --}}
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg mb-4 cursor-pointer">
            <x-dropdown align="right" width="full" align="dashboard">
                <x-slot name="trigger">
                    <div class="trigger flex justify-between items-center text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <button class="px-3 py-2 border border-transparent ">
                            <div>Categorie</div>
                        </button>

                        <div class="ms-auto p-4">
                            {{-- dropdown arrow --}}
                            <svg class="fill-current h-4 w-4" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <ul class="px-1">
                        @foreach ($categories as $category)
                            <li class="flex items-center border-b border-gray-500 justify-between">
                                {{-- link to show --}}
                                <x-dropdown-link :href="route('categories.show', $category)">{{ $category->name }}</x-dropdown-link>

                                <div class="cta ms-auto">
                                    {{-- link to edit --}}
                                    <x-dropdown-link :href="route('categories.edit', $category)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </x-dropdown-link>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </x-slot>
            </x-dropdown>
        </div>

        {{-- ingredients --}}
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg mb-4 cursor-pointer">
            <x-dropdown align="right" width="full" align="dashboard">
                <x-slot name="trigger">
                    <div class="trigger flex justify-between items-center text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <button class="px-3 py-2 border border-transparent ">
                            <div>Ingredienti</div>
                        </button>

                        <div class="ms-auto p-4">
                            <svg class="fill-current h-4 w-4" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <ul class="px-1">
                        @foreach ($ingredients as $ingredient)
                            <li class="flex items-center border-b border-gray-500 justify-between">
                                {{-- link to show --}}
                                <x-dropdown-link :href="route('ingredients.show', $ingredient)">{{ $ingredient->name }}</x-dropdown-link>

                                <div class="cta ms-auto">
                                    {{-- link to edit --}}
                                    <x-dropdown-link :href="route('ingredients.edit', $ingredient)">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </x-dropdown-link>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </x-slot>
            </x-dropdown>
        </div>

    </div>

</x-app-layout>
