<x-app-layout>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative h-6">
                    <h1 class="m-5"><strong>Lista de Postulaciones</strong></h1>
                    <a href="{{ route('postulaciones.create') }}" class="bg-green-500 hover:bg-green-700 dark:text-gray-200 py-2 px-4 font-bold rounded-md absolute top-0 right-0 mr-5">
                        Crear
                    </a>
                </div>
                <hr class="mt-7">
                <table class="border-collapse border border-slate-500 table-auto m-5">
                    <thead class="bg-green-600 text-white">
                        <tr>
                            <th class="border border-slate-600">Calendario Electoral</th>
                            <th class="border border-slate-600">Fecha Postulación</th>
                            <th class="border border-slate-600">Cuerpo Colegiado</th>
                            <th class="border border-slate-600">Resultado Electoral</th>
                            <th class="border border-slate-600">Programa Académico</th>
                            <th class="border border-slate-600">Facultad</th>
                            <th class="border border-slate-600">Candidatos</th>
                            <th class="border border-slate-600">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postulaciones as $postulacion)
                            <tr>
                                <td class="border border-slate-700 px-4 mx-auto"> {{ $postulacion->calendarioElectoral->concepto }}</td>
                                <td class="border border-slate-700 px-4 mx-auto"> {{ $postulacion->fechaPostulacion }}</td>
                                <td class="border border-slate-700 px-4 mx-auto"> {{ $postulacion->cuerpoColegiado->nombre }}</td>
                                <td class="border border-slate-700 px-4 mx-auto"> {{ $postulacion->resultadoElectoral }}</td>
                                <td class="border border-slate-700 px-4 mx-auto"> {{ $postulacion->programaAcademico->nombre_programa }}</td>
                                <td class="border border-slate-700 px-4 mx-auto"> {{ $postulacion->facultad}} </td>
                                <td class="border border-slate-700 px-4 mx-auto"> 
                                @foreach( $postulacion->candidatos as $candidato )
                                    <li>[ {{$candidato->pivot->numero_plancha}} ] {{ $candidato->nombres_apellidos}}</li>
                                    
                                @endforeach
                                </td>
                                <td class="border border-slate-700 px-4 mx-auto">
                                    <a href="{{ route('postulaciones.edit', $postulacion) }}" class="inline-flex items-center px-3 py-2 my-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Editar
                                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="my-10 mx-5">
                {{$postulaciones->links()}}
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>


        </div>
    </div>

    


</x-app-layout>
