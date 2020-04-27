<?php

namespace App\tenant;

use Config;
use DB;
use Schema;


class GerenciadorPlano {

    public function setConnect($Plano) {
        DB::purge('tenent');
        \Config::set('database.connections.tenent.host', $Plano['host']);
        \Config::set('database.connections.tenent.database', $Plano['database']);
        // \Config::set('database.connections.tenent.username', $Plano['user']);
        // \Config::set('database.connections.tenent.password', $Plano['password']);
        \Config::set('database.connections.tenent.port', $Plano['port']);
        DB::reconnect('tenent');
        Schema::connection('tenent')->getConnection()->reconnect();
    }
}
