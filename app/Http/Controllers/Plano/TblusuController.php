<?php

namespace App\Http\Controllers\Plano;

use App\Http\Controllers\Controller;
use App\Models\Plano\Tblusu;
use App\Models\Plano\Cadger;
use App\Traits\FuncoesTrait;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\FuncCall;
use function PHPSTORM_META\type;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class TblusuController extends Controller
{
    Use FuncoesTrait;

    public function index(){

        $listaMigalhas = json_encode([
            ["titulo"=>"Home","url"=>route('plano.principal')],
            ["titulo"=>"Lista de Usuários","url"=>""]
        ]);

        //$listaModelos = Tblusu::select('id','usucod','usunome','nome','situacao','status')->orderBy('usucod','desc')->paginate(10);      
        
        $listaModelos = Tblusu::ListaUsuarios(10);
        $listaCadgers = Cadger::ListaCadger();

        return view('plano.tblusu.index', compact('listaMigalhas','listaModelos','listaCadgers'));
    }

    public function create()
    {
        //
    }
    
    public function login(Request $request){    

        
        $validator = Validator::make($request->all(), [
            'usunome' => 'required',
            'ususenha' => ['required','min:6'],
        ]);

        if ($validator->fails()) {
            return $validator->errors(); 
        }else{
                                   
            $password = $this->codIF($request->ususenha);
  
            $usuarios = Tblusu::where('usunome', $request->usunome )->where('ususenha', $password)->first();  
            
            if($usuarios != null )
            {                            
                //auth()->guard('plano')->login($usuarios);                
                Auth::guard('plano')->login($usuarios);
                $tblusus = Auth::guard('plano')->user();
                
                $tblusus->token = $tblusus->createToken($tblusus->usunome)->accessToken;  

                return $tblusus;         
            }else{
                //return redirect('/')
                //    ->withErrors($validator)
                //     ->withInput();
                return ['status'=>false,'mensage'=>'Usuário ou senha invalidos'];
            }
        }        
    }

    public function logout(){
        //auth()->guard('plano')->logout();
        Auth::guard('plano')->logout();        
        return redirect('/');
    }       

    public function store(Request $request){

       
        $validatedData = Validator::make($request->all(), [ // <---
            'usunome' => ['required'],
            'ususenha' => ['required','min:6'],
            'nome' => ['required'],
            'situacao' => ['required'],
            'status' => ['required'],
            'id_codger' => ['required']
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
        
        //dd($tblusu);
        return Tblusu::find($id);

    }

    public function edit($id){
       // 
    }

    public function update(Request $request, $id)
    {
        
        $data=$request->all();          
        $password = $this->codIF($request->ususenha);

        if(isset($data['ususenha']) && $data['ususenha'] != "" ){
            $validatedData = Validator::make($data, [ // <---                
                'usunome' => ['required', Rule::unique('tblusu')->ignore($id)],
                'ususenha' => ['required','min:6'],
                'nome' => ['required'],
                'situacao' => ['required'],
                'status' => ['required']
            ],[
                'required' => 'Campo obrigatório em branco'
            ]);
            $password = $this->codIF($request->ususenha);
            $data['ususenha']=$password;
        }else{
            $validatedData = Validator::make($data, [ // <---
                'usunome' => ['required', Rule::unique('tblusu')->ignore($id)],
                'nome' => ['required'],
                'situacao' => ['required'],
                'status' => ['required']
            ],[
                'required' => 'Campo obrigatório em branco' 
            ]);
            unset($data['ususenha']);
        }

           
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        Tblusu::find($id)->update($data);
        return redirect()->back();
    }

    public function destroy($id)
    {
        Tblusu::find($id)->delete();
        return redirect()->back();
    }
}
