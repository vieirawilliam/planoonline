@extends('plano.principal')
@section('titulo', 'Cadastro de Usuários')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Lista de Usuários">
            <tabela-usuario 
            v-bind:titulos="['ID', 'Usu cod', 'Usu Nome', 'Nome', 'Status']"
            v-bind:itens="[[1,'300','ADMIN','william','ADMINISTRADOR'], [2,'600','NEY','NEYMAR','ADMINISTRADOR'] ]"
            criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="465464"
            >
            </tabela-usuario>
        </painel>
    </pagina>
@endsection