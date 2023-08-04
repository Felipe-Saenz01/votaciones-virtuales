<x-guest-layout>

    <x-sufragante-navigation-menu></x-sufragante-navigation-menu>
    
    <article class="bg-gray-200">
        <div class="max-w-7xl mx-auto py-5 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p> {{$postulacion->calendarioElectoral->concepto}} </p>

                <div class="max-w-6xl mx-auto px-12">
                    <form method="POST" action=" {{route('sufragante.store-votation')}} ">
                        @csrf
                        @method('POST')
                        @foreach ($postulacion->candidatos as $candidato)
                        <div class="mx-5 my-5 py-2">
                            <input id="{{$candidato->nombres_apellidos}}" type="radio" name="candidato_id" value=" {{$candidato->id}} ">
                            <label for="{{$candidato->nombres_apellidos}}">
                                 [{{$candidato->pivot->numero_plancha}}]{{$candidato->nombres_apellidos}}
                            </label>
                            <input type="hidden" name="cantidad_votos" value="{{$candidato->pivot->cantidad_votos}}">
                            </br>
                        </div>
                        @endforeach
                        <input type="hidden" name="postulacion_id" value="{{$postulacion->id}}">
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4" type="submit">
                                {{ __('Registrar Voto') }}
                            </x-button>
                        </div>
                        
                    </form>
                </div>

                {{-- <ul class="grid w-full gap-6 md:grid-cols-2">
                    <li>
                        <label for="hosting-small" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                            <div class="block">
                                <div class="w-full text-lg font-semibold">0-50 MB</div>
                                <div class="w-full">Good for small websites</div>
                            </div>
                            <input type="radio" id="hosting-small" name="hosting" value="hosting-small" class="hidden peer" required>
                        </label>
                    </li>
                    <li>
                        <label for="hosting-big" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">500-1000 MB</div>
                                <div class="w-full">Good for large websites</div>
                            </div>
                            <input type="radio" id="hosting-big" name="hosting" value="hosting-big" class="hidden peer">

                        </label>
                    </li>
                </ul> --}}
                {{-- <div class="md:grid md:grid-cols-2 md:gap-x-3 md:gap-y-2 ">
                    @foreach ($postulaciones as $postulacion)
                        <div class="md:col-span-1 ">
                            <div class="p-5 mx-5 my-4 bg-green-200 overflow-hidden shadow-xl sm:rounded-lg">
                                <h3 class=""><strong> {{ $postulacion->calendarioElectoral->concepto}} </strong></h3>
                                <p>{{ $postulacion->fechaPostulacion}}</p>
                                <p><strong>Facultad:</strong> {{$postulacion->facultad}} </p>
                                <p><strong>Cuerpo Colegiado:</strong> {{$postulacion->cuerpoColegiado->nombre}} </p>
                                <p><strong>Programa acadmico:</strong> {{$postulacion->programaAcademico->nombre_programa}} </p>
                                <div class="flex items-cente justify-center mt-5">
                                    <a href=" {{route('sufragante.votacion', $postulacion->id)}} " class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Votar</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
            </div>
        </div>
    </article>
    


    
</x-guest-layout>