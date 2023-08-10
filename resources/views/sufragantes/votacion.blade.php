<x-guest-layout>

    <x-sufragante-navigation-menu></x-sufragante-navigation-menu>
    
    <article class="min-h-screen sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="max-w-7xl mx-auto py-5 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="flex items-cender justify-center mb-4">
                    <h2 class="font-bold"> {{$postulacion->calendarioElectoral->concepto}} </h2>
                </div>

                <div class="max-w-6xl mx-auto px-12">
                    <form method="POST" action=" {{route('sufragante.store-votation')}} ">
                        @csrf
                        @method('POST')

                        <livewire:voting-form :postulacion="$postulacion" /> 
                          
                        <input type="hidden" name="postulacion_id" value="{{$postulacion->id}}">
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4" type="submit">
                                {{ __('Registrar Voto') }}
                            </x-button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </article>
    


    
</x-guest-layout>