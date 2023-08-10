<x-guest-layout>

    <x-sufragante-navigation-menu></x-sufragante-navigation-menu>
    
    <article class=" min-h-screen bg-gray-200">
        <div class="max-w-7xl mx-auto py-5 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="md:grid md:grid-cols-2 md:gap-x-3 md:gap-y-2 ">
                    @foreach ($postulaciones as $postulacion)
                        <div class="md:col-span-1 ">
                            <div class="p-5 mx-5 my-4 bg-green-200 overflow-hidden shadow-xl sm:rounded-lg">
                                <h3 class=""><strong> {{ $postulacion->calendarioElectoral->concepto}} </strong></h3>
                                <div class="w-full mx-auto">
                                    @foreach($postulacion->tags as $tag)
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-0.5 px-2.5 py-1 rounded-full dark:bg-gray-700 dark:text-gray-300">{{$tag->nombre}}</span>
                                    @endforeach
                                </div>
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
                </div>
            </div>
        </div>
    </article>


    
</x-guest-layout>
