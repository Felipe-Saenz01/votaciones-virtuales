<x-app-layout>

    <x-authentication-card>
        <x-slot name="logo">
        </x-slot>
        <div class="mx-auto font-bold my-5">
            <h1 class="mx-auto">Registro Cuerpo Colegiado</h1>
        </div>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{route('parametros.cuerpo_colegiado.store')}}">
            @csrf

            <div class="mb-3">
                <x-label for="nombre" value="{{ __('nombre') }}" />
                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" reqquired autofocus />
            </div>
 








            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4" type="submit">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-app-layout>