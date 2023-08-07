<x-app-layout>

    <div class="min-h-screen flex flex-col-2 sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="">
            <x-validation-errors class="mb-4" />
    
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <div class="md:grid md:grid-cols-2 md:gap-x-3 md:gap-y-2">
                {{-- Formulario para subir archivo excel --}}
                <div class="md:col-span-1 w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <h2 class=" flex items-cente justify-center font-semibold text-xl text-gray-800 leading-tight mb-4">
                        Crear Sufragante con Archivo Plano
                    </h2>
                    <p class="text-justify mb-2">En este formulario podrá cargar un archivo Excel (es decir que cuente con las extensiones .xlx o .xlsx) el cual contenga información del censo electoral, es importante aclarar que el archivo debe contar con las siguientes cabeceras en la fila número uno:</p>
                    <ul class="list-disc ml-6 ">
                        <li class="text-gray-700">Documento</li>
                        <li class="text-gray-700">Nombres</li>
                        <li class="text-gray-700">Correo</li>
                        <li class="text-gray-700">Genero</li>
                        <li class="text-gray-700">Estado</li>
                    </ul>
                    <p class="my-2">Puede revisar un ejemplo <a target="_BLANK" class="text-green-400 no-underline hover:underline" href="https://docs.google.com/spreadsheets/d/10IKseg7T8-RAEEI2WvHgfeliIyNb8KoUN-PNKzLoDs8/edit?usp=sharing">aquí</a>.</p>
                    <hr class="mb-5">
                    <form method="POST" action="{{ route('sufragante.archivo') }}" enctype="multipart/form-data">
                        @csrf
            
                        <div>
                            <x-label for="file" value="{{ __('Archivo Plano') }}" />
                            <x-input id="file" class="block mt-1 w-full" type="file" name="file"  required autofocus />
                        </div>
            
                        <input type="hidden" name="email" value="">
                        <div class="flex items-center justify-end mt-4">
            
                            <x-button class="ml-4" type="submit">
                                {{ __('Crear') }}
                            </x-button>
                        </div>
                    </form>
                </div>
                {{-- Formulario para subir sufragante individual --}}
                <div class="md:col-span-1 w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                    <h2 class=" flex items-cente justify-center font-semibold text-xl text-gray-800 leading-tight mb-3">
                        Crear Sufragante individual
                    </h2>
                    <form method="POST" action="{{ route('sufragante.store') }}">
                        @csrf
            
                        <div class="mb-3">
                            <x-label for="numeroDocumento" value="{{ __('Numero de documento') }}" />
                            <x-input id="fechaPostulacion" class="block mt-1 w-full" type="number" name="numeroDocumento" :value="old('numeroDocumento')" required autofocus />
                        </div>
                        <div class="mb-3">
                            <x-label for="nombres" value="{{ __('Nombres y Apellidos') }}" />
                            <x-input id="nombres" class="block mt-1 w-full" type="text" name="nombres" :value="old('nombres')" required />
                        </div>
                        <div class="mb-3">
                            <x-label for="email" value="{{ __('Correo institucional') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>
                        <div class="mb-3">
                            <x-label for="genero" value="{{ __('Genero') }}" />
                            <x-select id="genero" class="block mt-1 w-full" name="genero" required>
                                <option value="">Seleccione genero</option>
                                <option value="Masculino" :selected="old('genero')">Femenino</option>
                                <option value="Masculino" :selected="old('genero')"">Masculino</option>
                            </x-select>  
                        </div>
                        <div class="mb-3">
                            <x-label for="estado" value="{{ __('Estado') }}" />
                            <x-select id="estado" class="block mt-1 w-full" name="estado" required>
                                <option value="">Seleccione estado</option>
                                <option value="Activo" :selected="old('estado')">Activo</option>
                                <option value="Inactivo" :selected="old('estado')"">Inactivo</option>
                            </x-select>  
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4" type="submit">
                                {{ __('Registrar') }}
                            </x-button>
                        </div>
                    </form>
                </div>
    
            </div>

        </div>
 
    </div>

</x-app-layout>