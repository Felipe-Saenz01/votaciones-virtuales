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
            </div>
            <div class="my-10 mx-5">
                {{$postulaciones->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
