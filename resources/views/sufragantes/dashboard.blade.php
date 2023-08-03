<x-guest-layout>

    <x-sufragante-navigation-menu></x-sufragante-navigation-menu>

    <div>Bienvenido </div>
    <div>{{ auth('sufragante')->user()->nombres}}</div>
    
    <article>
        @foreach ($postulaciones as $postulacion)
            <div class="py-5 mx-5">
                <h3> {{ $postulacion->calendarioElectoral->concepto}}</h3>
                <p>{{ $postulacion->fechaPostulacion}}</p>
                <p><strong>Facultad:</strong> {{$postulacion->facultad}} </p>
                <p><strong>Cuerpo Colegiado:</strong> {{$postulacion->cuerpoColegiado->nombre}} </p>
                <p><strong>Programa acadmico:</strong> {{$postulacion->programaAcademico->nombre_programa}} </p>
                
                <h4>Candidatos</h4>
                @foreach ($postulacion->candidatos as $candidato)
                    <li> [ {{$candidato->pivot->numero_plancha}} ] {{$candidato->nombres_apellidos}} </li>
                @endforeach

            </div>
        @endforeach
    </article>


    
</x-guest-layout>
