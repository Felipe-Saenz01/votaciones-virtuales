<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">

        </x-slot>
        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div class="mb-4 text-sm text-gray-600">
            Hola <strong>{{$nombres}}</strong>, hemos enviado un código de acceso al correo suminstrado, ingresalo en el formulario para ingresar al aplicativo
        </div>
        
        <form method="POST" action="{{ route('sufragante.verify-token') }}">
            @csrf

            <div>
                <x-label for="token" value="{{ __('Código Validacion') }}" />
                <x-input id="token" class="block mt-1 w-full" type="text" name="codigo" :value="old('token')" required autofocus />
            </div>

            <input type="hidden" name="email" value="{{ $email }}">
            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4" type="submit">
                    {{ __('Verificar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>



