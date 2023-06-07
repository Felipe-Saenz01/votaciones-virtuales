<x-app-layout>

    <x-authentication-card>
        <x-slot name="logo">
        </x-slot>
        <div class="mx-auto font-bold flex justify-between my-5">
            <h1 class="mr-auto">Registro Calendario Electoral</h1>
            <form action="#" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="bg-red-500 hover:bg-red-700 dark:text-gray-200 py-1 px-2 font-bold rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>                      
                </button>

            </form>
        </div>
        

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{route('calendario.update',$calendario)}}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <x-label for="concepto" value="{{ __('Concepto') }}" />
                
                <x-input id="concepto" class="block mt-1 w-full" type="text" name="concepto" value="{{old('concepto', $calendario->concepto)}}" reqquired autofocus />
            </div>
            <div class="mb-3">
                <x-label for="fechaInicial" value="{{ __('Fecha Inicial') }}" />
                <x-input id="fechaInicial" class="block mt-1 w-full" type="date" name="fechaInicial" value="{{old('fechaInicial',$calendario->fechaInicial)}}" reqquired />
            </div>
            <div class="mb-3">
                <x-label for="fechaFinal" value="{{ __('Fecha Final') }}" />
                <x-input id="fechaFinal" class="block mt-1 w-full" type="date" name="fechaFinal" value="{{old('fechaFinal',$calendario->fechaFinal)}}" reqquired />
            </div>
            <div class="mb-3">
                <x-label for="fechaFinal" value="{{ __('Periodo Academico') }}" />
                <x-select id="fechaFinal" class="block mt-1 w-full" name="idPeriodoAcademico" required>
                    <option value="">Sleccione Periodo Academico</option>
                    @foreach ($periodos as $periodo)
                    <option value="{{$periodo->id}}" {{ $calendario->idPeriodoAcademico == $periodo->id ? 'selected' : 'a'}} >{{$periodo->nombrePeriodo}} </option>
                    @endforeach

                </x-select>
            </div>
            <div class="mb-3">
                <x-label for="fechaFinal" value="{{ __('Estado') }}" />
                <x-select id="fechaFinal" class="block mt-1 w-full" name="estado" required>
                    <option value="">Seleccione Estado</option>
                    <option value="Activo" {{$calendario->estado == 'Activo' ? 'selected' : ''}}>Activo</option>
                    <option value="Inactivo" {{$calendario->estado == 'Inactivo' ? 'selected' : ''}}>Inactivo</option>
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