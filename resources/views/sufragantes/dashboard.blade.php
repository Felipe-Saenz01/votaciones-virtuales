<x-guest-layout>

    <x-sufragante-navigation-menu></x-sufragante-navigation-menu>

    <div>Bienvenido </div>
    <div>{{ auth('sufragante')->user()->nombres}}</div>
    <form method="POST" action="{{ route('sufragante.logout') }}">
        @method('POST')
        @csrf
        {{-- <a rel="stylesheet" href="{{route('sufragante.logout')}}">logout</a> --}}
        <button type="submit">Cerrar Sesion</button>
 
    </form>


    
</x-guest-layout>
