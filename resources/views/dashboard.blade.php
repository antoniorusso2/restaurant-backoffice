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
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <ul class="p-2">
                        @foreach ($dishes as $dish)
                            <li>
                                {{ $dish->name }}
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
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <ul class="p-2">
                        @foreach ($categories as $category)
                            <li>
                                {{ $category->name }}
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
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <ul class="p-2">
                        @foreach ($ingredients as $ingredient)
                            <li>
                                {{ $ingredient->name }}
                            </li>
                        @endforeach
                    </ul>
                </x-slot>
            </x-dropdown>
        </div>

    </div>

</x-app-layout>
