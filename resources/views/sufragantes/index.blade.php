<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sufragantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative h-6">
                    <h1 class="m-5">Lista Sufragantes</h1>
                    <a href="{{route('sufragante.create')}}" class="bg-green-500 hover:bg-green-700 dark:text-gray-200 py-2 px-4 font-bold rounded-md absolute top-0 right-0 mr-5">
                        Crear
                    </a>
                </div>
                <hr class="mt-7">
                <table class=" border-collapse border border-slate-500 table-auto m-5">
                    <thead class="bg-green-600 text-white">
                        <tr>
                            <th class="border border-slate-600">Documento</th>
                            <th class="border border-slate-600">Nombres</th>
                            <th class="border border-slate-600">Email</th>
                            <th class="border border-slate-600">Genero</th>
                            <th class="border border-slate-600">Estado</th>
                            <th class="border border-slate-600">Tags</th>
                            <th class="border border-slate-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sufragantes as $sufragante)
                            <tr>
                                <td class="border border-slate-700 px-4 mx-auto"> {{$sufragante->numeroDocumento}} </td>
                                <td class="border border-slate-700 px-4 mx-auto"> {{$sufragante->nombres}} </td>
                                <td class="border border-slate-700 px-4 mx-auto"> {{$sufragante->email}} </td>
                                <td class="border border-slate-700 px-4 mx-auto"> {{$sufragante->genero}} </td>
                                <td class="border border-slate-700 px-4 mx-auto"> {{$sufragante->estado}} </td>
                                <td class="border border-slate-700 px-4 mx-auto">
                                    @foreach($sufragante->tags as $tag)
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-0.5 px-2.5 py-1 rounded-full dark:bg-gray-700 dark:text-gray-300">{{$tag->nombre}}</span>
                                    @endforeach
                                </td>
                                <td class="border border-slate-700 px-4 mx-auto">
                                    <a href="{{ route('sufragante.edit', $sufragante) }}" class="inline-flex items-center px-3 py-2 my-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Editar
                                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="my-10 mx-5">
                    {{$sufragantes->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>