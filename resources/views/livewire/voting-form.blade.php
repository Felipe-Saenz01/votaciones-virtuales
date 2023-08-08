<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class=" w-full grid grid-cols-1 gap-4 sm:grid-cols-3 lg:grid-cols-4 justify-around">
        @foreach ($candidatos as $candidato)
            <div class="{{$seleccionado == $candidato->id ? 'p-4 border border-gray-300 rounded-lg bg-blue-500 text-white ' : 'p-4 border border-gray-300 rounded-lg cursor-pointer'}} "
                wire:click="$set('seleccionado', '{{$candidato->id}}')"
                >
                <div class="flex items-center justify-center mb-3">
                    <img src="{{ asset('candidatos/default-user.jpg') }}" alt="{{ $candidato->nombres_apellidos }}" class="w-1/2  rounded-lg">
                </div>

                <div class="flex items-center justify-center">
                    <p class="font-bold">{{ $candidato->nombres_apellidos }}</p>
                </div>
                <div class="flex items-center justify-center">
                    <p class="font-bold">Hola bon dia</p>
                </div>
                
            </div>
        @endforeach
        <input type="hidden" name="candidato_id" value="{{$seleccionado}}">
    </div>
</div>
