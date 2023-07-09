<?php

namespace App\Http\Controllers;

use App\Mail\sufraganteEmailToken;
use App\Models\Sufragante;
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
        //
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

            $correo = new sufraganteEmailToken($sufragante);
            Mail::to($sufragante->email)->send($correo);
        }

        return view('sufragantes.token-verification',[
            'nombres' => $sufragante->nombres,
            'email' => $sufragante->email,
        ]);
        
    }

    /**
     * Verifica el correo y el token para permitir la autenticacion.
     */
    public function validatetoken(Request $request)
    {
        $request->validate([
            'codigo' => 'required',
        ]);
        $sufragante = Sufragante::where('email', $request->email)->first();
        if(!$sufragante){
            return view('/');
        }


        if($request->codigo != $sufragante->codigo){
            return redirect()->route('welcome')->withErrors('Código incorrecto');
        }
        
        $sufraganteAuth = Auth::guard('sufragante')->attempt(['email'=> $request->email,'password' => $request->codigo]);
        if($sufraganteAuth){
            $sufragante->codigo = null;
            $sufragante->save();
            $request->session()->regenerate();
            return redirect()->intended(route('sufragante.dashboard'));
        }
        return 'codigos coinciden: '.$request->codigo .' Y token: '.$sufragante->token;

    }

    public function logout(Request $request)
    {
        Auth::guard('sufragante')->logout();
        Session::regenerateToken();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }
}
