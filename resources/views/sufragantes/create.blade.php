<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Sufragantes') }}
        </h2>
    </x-slot>

    <x-authentication-card>
        <x-slot name="logo">

        </x-slot>
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        
        <form method="POST" action="{{ route('sufragante.archivo') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <x-label for="file" value="{{ __('Archivo Plano') }}" />
                <x-input id="file" class="block mt-1 w-full" type="file" name="file"  required autofocus />
            </div>

            <input type="hidden" name="email" value="">
            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4" type="submit">
                    {{ __('Crear') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>

</x-app-layout>