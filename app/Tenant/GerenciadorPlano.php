<?php

namespace App\tenant;

use Config;
use Illuminate\Support\Facades\DB;
use Schema;


class GerenciadorPlano {

    public function setConnect($Plano) {
        
        DB::purge('tenent');
        Config::set('database.connections.tenent.host', $Plano['plano']['host']);
        Config::set('database.connections.tenent.database', $Plano['plano']['database']);
        Config::set('database.connections.tenent.username', $Plano['plano']['user']);
        Config::set('database.connections.tenent.password', $Plano['plano']['password']);
        Config::set('database.connections.tenent.port', $Plano['plano']['port']);
        DB::reconnect('tenent');
        Schema::connection('tenent')->getConnection()->reconnect();


    }
}
