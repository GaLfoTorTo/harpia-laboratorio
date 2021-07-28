<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request) {
        $pesquisa = $request->pesquisa;

        if($pesquisa != '') {
            $users = User::where('nome', 'like', "%".$pesquisa."%")->paginate(1000);
        } else {
            $users = User::paginate(10);
        }
        if($request->is('api/user')){
            return response()->json([$users],200);
        }else{
            return view('user.index', compact('users','pesquisa'));
        }
    } 
    public function novo() {

        return view('user.form');
    }
    public function editar($id) {

        $user = User::find($id);
        return view('user.form', compact('user'));
    }
    public function salvar(UserRequest $request) {

        if($request->hasFile('foto_temp')) {
            
            //echo 'tem documento';
            // renomeando documento 
            $nome_documento = date('YmdHmi').'.'.$request->foto_temp->getClientOriginalExtension();

            $request['foto'] = '/uploads/user/' . $nome_documento;

            $request->foto_temp->move(public_path('uploads/user'), $nome_documento);
        }

        $ehvalido = $request->validated();
        if($request->password != '' ){
            $request['password'] = bcrypt($request['password']);
        }else{
            unset($request['password']);
        }

        if($request->id != '') {
            $user = User::find($request->id);
            $user->update($request->all());
            
        }else{
            $user = $request->all();
            $user = User::create($user);
        }
        return redirect('/user/editar/'. $user->id)->with('success', 'Salvo com sucesso!');
    }
    public function deletar($id) {
        $user = User::find($id);
        if(!empty($user)){
            $user->delete();
            if($request->path == `api/user/deletar/${id}`){
                return response()->json(['sucesso' => 'Deletado com sucesso!'], 200);
            }else{
                return redirect('user')->with('success', 'Deletado com sucesso!');
            }
        } else {
            if($request->path == `api/user/deletar/${id}`){
                return response()->json(['error' => 'Registro não encontrado!'], 404);
            }else{
                return redirect('user')->with('danger', 'Registro não encontrado!');
            }
        }
    }
}
