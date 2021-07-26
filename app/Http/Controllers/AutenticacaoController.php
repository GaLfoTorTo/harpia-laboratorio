<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AutenticacaoController extends Controller
{
    public function index() {
        return view('autenticacao.login');
    }
    public function logar(Request $request) {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Login efetuado com sucesso!');
        }

        return back()->withErrors([
            'email' => 'As credenciais informadas não foram encontradas, tente novamente.',
        ]);

    }
    public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    
    public function logarApp(Request $request){
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();
        if(Auth::attempt($credentials)){
            $authentication = Auth::user();
            $token = $user->createToken($request->device_name.'_'.$user->name)->plainTextToken;
            return response()->json(['user'=>$authentication, 'token'=>$token],200);
        }
    }
}
