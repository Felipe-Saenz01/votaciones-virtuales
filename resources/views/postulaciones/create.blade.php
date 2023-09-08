<x-app-layout>
    <x-authentication-card>
        <x-slot name="logo"></x-slot>

        <h1 class="font-bold">Registro de Postulaciones</h1>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('postulaciones.store') }}">
            @csrf

            <div class="mb-3">
                <x-label for="fechaPostulacion" value="{{ __('Fecha de Postulación') }}" />
                <x-input id="fechaPostulacion" class="block mt-1 w-full" type="date" name="fechaPostulacion" :value="old('fechaPostulacion')" required autofocus />
            </div>

            <div class="mb-3">
                <x-label for="idCuerpoColegiado" value="{{ __('Cuerpo Colegiado') }}" />
                <x-select id="idCuerpoColegiado" class="block mt-1 w-full" name="cuerpo_colegiado_id" required>
                    <option value="">Seleccione Cuerpo Colegiado</option>
                    @foreach ($cuerposColegiados as $cuerpoColegiado)
                        <option value="{{ $cuerpoColegiado->id }}">{{ $cuerpoColegiado->nombre }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-3">
                <x-label for="codigo_programa" value="{{ __('Programa Académico') }}" />
                <x-select id="codigo_programa" class="block mt-1 w-full" name="programa_academico_id" required>
                    <option value="">Seleccione Programa Académico</option>
                    @foreach ($programasAcademicos as $programaAcademico)
                        <option value="{{ $programaAcademico->id }}">{{ $programaAcademico->nombre_programa }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-3">
                <x-label for="codigo_programa" value="{{ __('Calendario Electoral') }}" />
                <x-select id="codigo_programa" class="block mt-1 w-full" name="calendario_electoral_id" required>
                    <option value="">Seleccione Calendario Electoral</option>
                    @foreach ($calendariosElectorales as $calendarioElectoral)
                        <option value="{{ $calendarioElectoral->id }}">{{ $calendarioElectoral->concepto }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-3">
                <x-label for="resultadoElectoral" value="{{ __('Resultado Electoral') }}" />
                <x-input id="resultadoElectoral" class="block mt-1 w-full" type="text" name="resultadoElectoral" :value="old('resultadoElectoral')" required />
            </div>

            

            <div class="mb-3">
                <x-label for="facultad" value="{{ __('Facultad') }}" />
                <x-select id="facultad" class="block mt-1 w-full" name="facultad" required>
                    <option value="">Seleccione Programa Académico</option>
                    @foreach ($facultades as $facultad)
                        <option value="{{ $facultad->nombrefacultad }}">{{ $facultad->nombrefacultad }}</option>
                    @endforeach
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
