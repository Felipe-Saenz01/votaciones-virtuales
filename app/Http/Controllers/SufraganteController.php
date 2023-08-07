<?php

namespace App\Http\Controllers;

use App\Imports\SufragantesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\sufraganteEmailToken;
use App\Models\Candidato;
use App\Models\Postulacion;
use App\Models\Sufragante;
use App\Models\Voto;
use App\Notifications\SendSufraganteToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SufraganteController extends Controller
{

    //protected $redirectTo = '/sufragante';
    /**
     * Display a listing of the resource.
     */

    // public function __construct()
    // {
    //     $this->middleware('guest:sufragante')->except('logout');
    // }

    public function index()
    {
        return view('sufragantes.index', [
            'sufragantes' => Sufragante::latest()->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sufragantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numeroDocumento' => 'required',
            'nombres' => 'required',
            'email' => 'required|email',
            'genero' => 'required',
            'estado' => 'required',
        ]);

        Sufragante::create($request->all());

        return redirect()->route('sufragante.index')
            ->with('success', 'Sufragante creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sufragante $sufragante)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sufragante $sufragante)
    {
        return view('sufragantes.edit', [
            'sufragante' => $sufragante,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sufragante $sufragante)
    {
        $request->validate([
            'numeroDocumento' => 'required',
            'nombres' => 'required',
            'email' => 'required|email',
            'genero' => 'required',
            'estado' => 'required',
        ]);

        $sufragante->update($request->all());

        return redirect()->route('sufragante.index')
            ->with('success', 'Sufragante actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sufragante $sufragante)
    {
        $sufragante->delete();

        return redirect()->route('sufragante.index')
            ->with('success', 'Sufragante eliminada exitosamente.');
    }
    /**
     * Genera un token de acceso y lo manda al correo suministrado
     */
    public function generatetoken(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $sufragante = Sufragante::where('email', $request->email)->first();

        
        if(!$sufragante){
            return redirect()->back()->withErrors('Este correo no coincide con algun registro de la lista de sufragantes.');
        }

        if(is_null($sufragante->codigo)){
            $token = Str::random(7);
            $sufragante->codigo = $token;
            $sufragante->password = Hash::make($token);
            $sufragante->save();


            $sufragante->notify(new SendSufraganteToken($sufragante->nombres, $sufragante->codigo, $sufragante->numeroDocumento));
            // $correo = new sufraganteEmailToken($sufragante);
            // Mail::to($sufragante->email)->send($correo);
        }

        return redirect()->route('welcome')->with('status', 'Se ha enviado un correo para acceder al aplicativo.');
        
    }

    /**
     * Verifica el correo y el token para permitir la autenticacion.
     */
    public function validatetoken($numeroDocumento, $codigo)
    {
        $sufragante = Sufragante::where('numeroDocumento', $numeroDocumento)->first();
        if(!$sufragante){
            return view('/');
        }


        if($codigo != $sufragante->codigo){
            return redirect()->route('welcome')->withErrors('Código incorrecto');
        }
        
        $sufraganteAuth = Auth::guard('sufragante')->attempt(['email'=> $sufragante->email,'password' => $codigo]);
        if($sufraganteAuth){
            $sufragante->codigo = null;
            $sufragante->save();
            return redirect()->intended(route('sufragante.dashboard'));
        }

    }

    public function logout(Request $request)
    {
        Auth::guard('sufragante')->logout();
        Session::regenerateToken();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }

    public function filePlanSufragate(Request $request)
    {   
        //return $request;
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        $file = $request->file('file');

        Excel::import(new SufragantesImport, $file);


        return redirect()->route('sufragante.index')->with('success', 'Los registros se han importado correctamente.');
    }

    public function inicio(){

        return view('sufragantes.dashboard',[
            'postulaciones' => Postulacion::latest()->paginate()
        ]);
    }

    public function votacion(Postulacion $postulacion){
        $voto = Voto::where('postulacion_id', $postulacion->id)->where('sufragante_id', Auth::user()->id)->first();
        if($voto){
            return "existe";
        }else{
            //return "no existe";
            return view('sufragantes.votacion',[
                'postulacion' => $postulacion
            ]);
        }
        
    }

    public function storeVotation(Request $request){

        //obtiene la postulacion
        $postulacion = Postulacion::find($request->postulacion_id);
        //obtiene el candidato especifico a esa postulacion
        $candidato = $postulacion->candidatos()->where('candidato_id', $request->candidato_id)->first();
        //se obtiene la cantidad de votos del candidato obtenido
        $voto = $candidato->pivot->cantidad_votos;
        //se actualiza el valor del voto del candidato
        $postulacion->candidatos()->updateExistingPivot($request->candidato_id, ['cantidad_votos' => $voto + 1]);
        $sufragante_id = Auth::user()->id;
        Voto::create([
            'sufragante_id' => $sufragante_id,
            'postulacion_id' => $request->postulacion_id,
            'candidato_id' => $request->candidato_id,
        ]);

        return redirect()->route('sufragante.dashboard')->with('status', 'Su voto ha sido registrado.');
    }
}
