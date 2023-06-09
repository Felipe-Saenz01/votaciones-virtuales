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
                    <a href="#" class="bg-green-500 hover:bg-green-700 dark:text-gray-200 py-2 px-4 font-bold rounded-md absolute top-0 right-0 mr-5">
                        Crear
                    </a>
                </div>
                <hr class="mt-7">
                <table class="border-collapse border border-slate-500 table-auto m-5">
                    <thead class="bg-green-600 text-white">
                        <tr>
                            <th class="border border-slate-600">Documento</th>
                            <th class="border border-slate-600">Nombres</th>
                            <th class="border border-slate-600">Email</th>
                            <th class="border border-slate-600">Gnero</th>
                            <th class="border border-slate-600">Estado</th>
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
                            </tr>
                        @endforeach
                    </tbody>
            </div>
            <div class="my-10 mx-5">
                {{$sufragantes->links()}}
            </div>
        </div>
    </div>
</x-app-layout>