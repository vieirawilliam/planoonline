@extends('plano.principal')
@section('titulo', 'Cadastro de Usuários')

@section('content')
<pagina tamanho="12">
    <painel titulo="Lista de Usuários">
        <migalhas :lista="{{$listaMigalhas}}"></migalhas>

        <modallink tipo="button" nome="meuModalTeste" titulo="Novo" css=""></modallink>

        <tabela-usuario 
        v-bind:titulos="['ID', 'Usu cod', 'Usu Nome', 'Nome', 'Status']" 
        v-bind:itens="[[1,'300','ADMIN','william','ADMINISTRADOR'], [2,'600','NEY','NEYMAR','ADMINISTRADOR'] ]" 
        ordem="desc" ordemcol="2" criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="465464">
        </tabela-usuario>
    </painel>
</pagina>

    <modal id="meuModalTeste" nome="meuModalTeste">
        <painel titulo="Adicionar">
            <formulario css="" action="#" method="put" enctype="multipart/form-data" token="12345">

                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
                </div>
                <button class="btn btn-info">Adicionar</button>
            </formulario>
        </painel>
    </modal>

@endsection
