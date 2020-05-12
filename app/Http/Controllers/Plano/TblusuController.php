<?php

namespace App\Http\Controllers\Plano;

use App\Http\Controllers\Controller;
use App\Models\Plano\Tblusu;
use App\Traits\FuncoesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class TblusuController extends Controller
{
    Use FuncoesTrait;

    public function index(){

        $listaMigalhas = json_encode([
            ["titulo"=>"Home","url"=>route('plano.principal')],
            ["titulo"=>"Lista de Usuários","url"=>""]
        ]);

        $listaUsuarios = json_encode([
            ["id"=>'01', "usucod"=>'0001',"usunome"=>'WILLIAM',"nome"=>'WILLIAM VIEIRA ALVES',"situacao"=>'ATIVO',"status"=>'USUARIO'],
            ["id"=>'02', "usucod"=>'0002',"usunome"=>'ADMIN',"nome"=>'ADMINISTRADOR',"situacao"=>'ATIVO',"status"=>'ADMINISTRADOR']
        ]);

        $tblusus = Tblusu::all();
        return view('plano.tblusu.index', compact('tblusus','listaMigalhas','listaUsuarios'));
    }

    public function login(Request $request){

        $validator = validator($request->all(),[
            'usunome'=>'required',
            'ususenha'=>'required'
        ]);

        if($validator->fails()){
            return redirect('/')
                    ->withErrors($validator)
                    ->withInput();
        }else{
                                   
            $password = $this->codIF($request->ususenha);    
            $usuarios = Tblusu::where('usunome', $request->usunome )->where('ususenha', $password)->first();  
            
            if($usuarios != null )
            {                            
                //auth()->guard('plano')->login($usuarios);                
                Auth::guard('plano')->login($usuarios);
                $tblusus = Tblusu::all();
                return view('plano.principal');         
            }else{
                return redirect('/')
                    ->withErrors($validator)
                    ->withInput();
            }
        }        
    }

    public function logout(){
        //auth()->guard('plano')->logout();
        Auth::guard('plano')->logout();        
        return redirect('/');
    }
}
