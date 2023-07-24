<?php

namespace App\Http\Controllers;

use App\Imports\SufragantesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Mail\sufraganteEmailToken;
use App\Models\Sufragante;
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

    protected $redirectTo = '/sufragante';
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('guest:sufragante')->except('logout');
    }

    public function index()
    {
        return view('sufragantes.index', [
            'sufragantes' => Sufragante::latest()->paginate()
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sufragante $sufragante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sufragante $sufragante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sufragante $sufragante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sufragante $sufragante)
    {
        //
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
}
