<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use App\Models\cidade;
use App\Models\estado;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __invoke() {
        
        $itensUsuario = usuario::count();
        $usuario = usuario::orderby('id', 'desc')->paginate();
        
        return view('index', ['usuario' => $usuario, 'QtdUsuario' => $itensUsuario]);

    }

    public function index(){
        
        $itensUsuario = usuario::count();
        
        $usuario = usuario::orderby('id', 'desc')->paginate();
        return view('index', ['usuario' => $usuario, 'QtdUsuario' => $itensUsuario]);
    }
    
    public function create(){
        return view('insere');
    }
    
    public function insert(Request $request){

        $date1 = strtr($request->dt_nasc, '/', '-');
        $newDateFormat2 = date('Y-m-d', strtotime($date1));
        
        $usuario = new usuario();
        $usuario->nome = $request->nome;
        $usuario->cpf = preg_replace('/[^0-9]/', '', $request->cpf);
        $usuario->dt_nascimento = $newDateFormat2;
        $usuario->email = $request->email;
        $usuario->telefone = preg_replace('/[^0-9]/', '', $request->telefone);
        $usuario->id_estado = $request->estado;
        $usuario->id_cidade = $request->cidade;
        
        $itens = usuario::where('cpf','=', preg_replace('/[^0-9]/', '', $request->cpf))->orwhere('email', '=', $request->email)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Já existe registro com este CPF ou E-MAIL, revise-as!') </script>";
            return view('insere');
        }
        $usuario->save();

        return redirect()->route('index');

    }
    
    public function edit(usuario $usuario){
        return view('edit', ['usuario' => $usuario]);
    }
    
    public function editar(Request $request, usuario $usuario){
        $date1 = strtr($request->dt_nasc, '/', '-');
        $newDateFormat2 = date('Y-m-d', strtotime($date1));
        
        //$usuario = new usuario();
        $usuario->nome = $request->nome;
        $usuario->cpf = preg_replace('/[^0-9]/', '', $request->cpf);
        $usuario->dt_nascimento = $newDateFormat2;
        $usuario->email = $request->email;
        $usuario->telefone = preg_replace('/[^0-9]/', '', $request->telefone);
        $usuario->id_estado = $request->estado;
        $usuario->id_cidade = $request->cidade;
        
        /*$itens = 0;
        $itens += mzo_usuario::where('cpf','=', preg_replace('/[^0-9]/', '', $request->cpf))->where('id', '!=', $usuario->id)->count();
        $itens += mzo_usuario::where('email', '=', $request->email)->where('id', '!=', $usuario->id)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Já existe registro com este CPF ou E-MAIL, revise-as!') </script>";
            return view('admin.usuario.edit', ['usuario' => $usuario]);
        }*/
        
        $usuario->save();
        return redirect()->route('index');
    }
    
    public function modal($id){
        
        $itensUser = usuario::count();
        
        $usuarios = usuario::orderby('id', 'desc')->paginate();
        return view('index', ['usuario' => $usuarios, 'idUsuarioDelete' => $id, 'QtdUsuario' => $itensUser]);
    }

    public function delete(usuario $usuario){
        $usuario->delete();
        return redirect()->route('index');
    }
}
