<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tabla
        </h2>
    </x-slot>

    <x-container class="py-12 px-2">

        @livewire('article-table')

    </x-container>

</x-app-layout>