<x-app-layout>

    <x-authentication-card>
        <x-slot name="logo">
        </x-slot>
        <div class="mx-auto font-bold my-5">
            <h1 class="mx-auto">Registro Calendario Eelctoral</h1>
        </div>
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{route('calendario.store')}}">
            @csrf

            <div class="mb-3">
                <x-label for="concepto" value="{{ __('Concepto') }}" />
                <x-input id="concepto" class="block mt-1 w-full" type="text" name="concepto" :value="old('concepto')" reqquired autofocus />
            </div>
            <div class="mb-3">
                <x-label for="fechaInicial" value="{{ __('Fecha Inicial') }}" />
                <x-input id="fechaInicial" class="block mt-1 w-full" type="date" name="fechaInicial" :value="old('fechaInicial')" reqquired />
            </div>
            <div class="mb-3">
                <x-label for="fechaFinal" value="{{ __('Fecha Final') }}" />
                <x-input id="fechaFinal" class="block mt-1 w-full" type="date" name="fechaFinal" :value="old('fechaFinal')" reqquired />
            </div>
            <div class="mb-3">
                <x-label for="fechaFinal" value="{{ __('Periodo Academico') }}" />
                <x-select id="fechaFinal" class="block mt-1 w-full" name="idPeriodoAcademico" required>
                    <option value="">Sleccione Periodo Academico</option>
                    @foreach ($periodos as $periodo)
                    <option value="{{$periodo->id}}">{{$periodo->nombrePeriodo}}</option>
                    @endforeach

                </x-select>
            </div>
            <div class="mb-3">
                <x-label for="fechaFinal" value="{{ __('Estado') }}" />
                <x-select id="fechaFinal" class="block mt-1 w-full" name="estado" required>
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