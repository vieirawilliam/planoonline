<?php
namespace App\Traits;

trait FuncoesTrait  {

    #FUNÇÃO DE CODIFICAR SENHA
    public static function codIF($texto): string
    {

        $n = 0;
        $senha = "";

        for ($n = strlen($texto) - 1; $n >= 0; $n--) {
            $senha .= chr(ord(substr($texto, $n, 1)) - 20);
        }
        return $senha;
    }
    #FUNÇÃO DE DESCODIFICAR SENHA
    public static function decodIF($texto): string
    {
        # code...
        $n = 0;
        $senha = "";

        for ($n = strlen($texto) - 1; $n >= 0; $n--) {
            $senha .= chr(ord(substr($texto, $n, 1)) + 20);
        }
        return $senha;
    }
}
