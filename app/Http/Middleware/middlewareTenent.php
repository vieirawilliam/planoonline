<?php

namespace App\Http\Middleware;

use Closure;
use App\tenant\GerenciadorPlano;
use Session;
USE Request;
use Auth;

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
        $clientes = array(
            "plano" => array(
                "host" => "",
                "database" => env('DB_DATABASE', database_path('database.sqlite')),
                // "user" => "root",
                // "password" => "",
                "port" => "3306",
            )
        );

        if (array_key_exists($subdomain, $clientes)) {
            return $clientes[$subdomain];
        } else {
            abort(401);
        }
    }

}
