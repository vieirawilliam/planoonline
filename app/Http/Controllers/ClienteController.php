<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Admin;
use App\Models\Admin\Cliente;
use App\User;

class ClienteController extends Controller
{
    //
    public function index(){
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    public function adicionar(){
        
        return view('cliente.adicionar');
    }

    public function salvar(Request $request){

        $dados = $request->all();

        Cliente::create($dados);

        return redirect()->route('admin.clientes');

    }

    public function editar($id){
        
        $clientes = Cliente::find($id);

        return view('cliente.editar',compact('clientes'));
    }

    public function atualizar(Request $resquest,$id){

        $dados = $resquest->all();

        Cliente::find($id)->update($dados);

        return redirect()->route('admin.clientes');
    }

    public function deletar($id){
        Cliente::find($id)->delete();
        return redirect()->route('admin.clientes');
    }

    public static function retornaClienteDominio($subdominio){

        $cliente = Cliente::where('cliente_name', $subdominio )->first(); 
        
        return $cliente;
    }
}
