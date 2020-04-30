<?php

namespace App\Http\Middleware;

use Closure;
use App\tenant\GerenciadorPlano;
use Session;
USE Request;
use Auth;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\DB;
use function PHPSTORM_META\elementType;

class middlewareTenent {
    
    public function handle($request, Closure $next) {
        
        $GerenciadorPlano = app(GerenciadorPlano::class);
        $subdomain  = $this->getSub( $request->getHost() );
        $Plano = $this->getPlano($subdomain);
        if ($Plano == null) { abort(401); }
        $GerenciadorPlano->setConnect($Plano);

        return $next($request);
    }

    public function getSub($host) {
       
        $subdomain = explode(".", $host);
        $subdomain = $subdomain[0];
        return $subdomain;

   }

    public function getPlano($subdomain) {
        
        $cliente = ClienteController::retornaClienteDominio($subdomain);

        if($cliente['cliente_ip'] != ''){
            $clientes = array(
                "plano" => array(
                    "host" => $cliente['cliente_ip'],
                    "database" => $cliente['cliente_tabela'] ,
                    "user" => "WARELINE" ,
                    "password" => "BENEF" ,
                    "port" => $cliente['cliente_porta'],
                )
            );
            return $clientes;
        }else{
            abort(401);
        }        
    }

}
