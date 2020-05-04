<?php

namespace App\Http\Controllers\Plano;

use App\Http\Controllers\Controller;
use App\Models\Plano\Tblusu;
use App\Traits\FuncoesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TblusuController extends Controller
{
    Use FuncoesTrait;

    public function index(){
        $tblusus = Tblusu::all();
        return view('plano.tblusu.index', compact('tblusus'));
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
            
            if($usuarios['ususenha'] != '')
            {                            
                //auth()->guard('plano')->login($usuarios);                
                Auth::guard('plano')->login($usuarios);
                $tblusus = Tblusu::all();
                return view('plano.tblusu.index', compact('tblusus'));         
                
            }else{
                return "NÃO ENCONTRO USUÁRIO E SENHA";
            }
        }        
    }

    public function logout(){
        //auth()->guard('plano')->logout();
        Auth::guard('plano')->logout();        
        return redirect('/');
    }
}
