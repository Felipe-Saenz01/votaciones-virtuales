<x-app-layout>

    <x-authentication-card>
        <x-slot name="logo">
        </x-slot>
        <div class="mx-auto font-bold my-5">
            <h1 class="mx-auto">Registro Programa Academico</h1>
        </div>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{route('parametros.programas.store')}}">
            @csrf

            <div class="mb-3">
                <x-label for="nombre_programa" value="{{ __('Programa') }}" />
                <x-input id="nombre_programa" class="block mt-1 w-full" type="text" name="nombre_programa" :value="old('programa')" reqquired autofocus />
            </div>

            <div class="mb-3">
                <x-label for="idFacultad" value="{{ __('Facultad') }}" />
                <x-select id="idFacultad" class="block mt-1 w-full" name="idFacultad" required>
                    <option value="">Seleccione Programa Académico</option>
                    @foreach ($facultades as $index => $facultad)
                        <option value="{{ $facultad->id }}">{{ $nombrefacultades[$index]->nombrefacultad }}</option>
                    @endforeach
                </x-select>
                    
            </div>

            <div class="mb-3">
                <x-label for="estado" value="{{ __('Estado') }}" />
                <x-select id="estadp" class="block mt-1 w-full" name="estado" required>
                    <option value="">Seleccione Estado</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </x-select>
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4" type="submit">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-app-layout>