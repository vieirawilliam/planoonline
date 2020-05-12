@extends('plano.principal')
@section('titulo', 'Cadastro de Usuários')

@section('content')
<pagina tamanho="12">
    <painel titulo="Lista de Usuários">
        <migalhas :lista="{{$listaMigalhas}}"></migalhas>

        <modallink tipo="button" nome="meuModalTeste" titulo="Novo" css=""></modallink>

        <tabela-usuario v-bind:titulos="['ID', 'Usu cod', 'Usu Nome', 'Nome', 'Situacao','Status']" 
                        v-bind:itens="{{$listaUsuarios}}" 
                        ordem="desc" ordemcol="2" criar="#criar" detalhe="#detalhe" 
                        editar="#editar" deletar="#deletar" token="465464" 
                        modal="sim">
        </tabela-usuario>
    </painel>
</pagina>

<modal id="meuModalTeste" nome="meuModalTeste">
    <painel titulo="Cadastro de Usuários">
        <formulario css="" action="#" method="put" enctype="multipart/form-data" token="12345">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="usunome">Login</label>
                    <input type="text" class="form-control" id="usunome" placeholder="Login">
                </div>
                <div class="form-group col-md-6">
                    <label for="ususenha">Senha</label>
                    <input type="password" class="form-control" id="ususenha" placeholder="Senha">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome">
                </div>
                
                <div class="form-group col-md-6">
                    <label for="situacao">Situação</label>
                    <select id="situacao" class="form-control">
                        <option selected>ATIVO</option>
                        <option>INATIVO</option>
                    </select>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="status">Perfil</label>
                    <select id="status" class="form-control">
                        <option selected>ADMINISTRADOR</option>
                        <option>AUDITOR</option>
                        <option>EMPRESA</option>
                        <option>PRESTADOR</option>
                        <option>USUARIO</option>
                        <option>COMERCIAL</option>
                        <option>VENDEDOR</option>
                    </select>
                </div>
            </div>

            

            <div class="form-group col-md-6">    
                <button type="submit" class="btn btn-primary">Gravar</button>      
            </div>
            
        </formulario>
    </painel>
</modal>

@endsection