<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-container>

            {{-- Colores success, primary, error, sin props amarillo --}}
            @php
                $type="success"
            @endphp
            <x-alert type='primary'>

                <x-slot name="title">
                    Fuck!
                </x-slot>

                Esto es una alerta detonante! bumm!!
            </x-alert>

        </x-container>
    </div>
</x-app-layout>
