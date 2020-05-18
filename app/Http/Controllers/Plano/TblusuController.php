<?php

namespace App\Http\Controllers\Plano;

use App\Http\Controllers\Controller;
use App\Models\Plano\Tblusu;
use App\Traits\FuncoesTrait;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\FuncCall;

use function PHPSTORM_META\type;

class TblusuController extends Controller
{
    Use FuncoesTrait;

    public function index(){

        $listaMigalhas = json_encode([
            ["titulo"=>"Home","url"=>route('plano.principal')],
            ["titulo"=>"Lista de Usuários","url"=>""]
        ]);

        $listaUsuarios = json_encode(Tblusu::select('id','usucod','usunome','nome','situacao','status')->orderBy('usucod','desc') ->limit(10)->get());      
       
        return view('plano.tblusu.index', compact('listaMigalhas','listaUsuarios'));
    }

    public function login(Request $request){

        
        $validator = Validator::make($request->all(), [
            'usunome' => 'required',
            'ususenha' => 'required',
        ]);

        if ($validator->fails()) {
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

    public function store(Request $request){

        
        $validatedData = $request->validate([
            'usunome' => ['required'],
            'ususenha' => ['required'],
            'nome' => ['required'],
            'situacao' => ['required'],
            'status' => ['required']
        ]);
               
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $data = Tblusu::select('usucod')->orderBy('usucod','desc')->limit(1)->get();       
        $usucod = $data[0]->usucod ;
        $usucod = str_pad( $usucod + 1, 4, '0', STR_PAD_LEFT);

        $password = $this->codIF($request->ususenha);
        $data=$request->all();
        $data['ususenha']=$password;
        $data['usucod']=$usucod;

        Tblusu::create($data);
        return redirect()->back();
        
    }

    public function show($id){
        
        return Tblusu::find($id);

    }

    public function edit($id){
        
    }
}
