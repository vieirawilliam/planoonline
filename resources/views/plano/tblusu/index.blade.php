@extends('plano.principal')
@section('titulo', 'Cadastro de Usuários')

@section('content')
<pagina tamanho="12">

    @if($errors->all())
      <div class="alert alert-danger alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $key => $value)
          <li><strong>{{$value}}</strong></li>
        @endforeach
      </div>
    @endif

    <painel titulo="Lista de Usuários">
        <migalhas :lista="{{$listaMigalhas}}"></migalhas>

        <tabela-usuario v-bind:titulos="['ID', 'Usu cod', 'Usu Nome', 'Nome', 'Situacao','Status']" 
        v-bind:itens="{{$listaUsuarios}}" ordem="desc" ordemcol="2" criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="465464" modal="sim">
        </tabela-usuario>
    </painel>
</pagina>

<modal id="adicionar" nome="adicionar" titulo="Cadastro de Usuários - NOVO">
    <formulario id="formAdicionar" css="" action="{{route('tblusu.store')}}" method="post" enctype="multipart/form-data" token="{{csrf_token()}}">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="usunome">Login</label>
                <input type="text" class="form-control" id="usunome" name="usunome" placeholder="Login"  value="{{old('usunome')}}" >
            </div>
            <div class="form-group col-md-6">
                <label for="ususenha">Senha</label>
                <input type="password" class="form-control" id="ususenha" name="ususenha" placeholder="Senha" value="{{old('ususenha')}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="{{old('nome')}}">
            </div>

            <div class="form-group col-md-6">
                <label for="situacao">Situação</label>
                <select id="situacao" class="form-control" name="situacao" value="{{old('situacao')}}">
                    <option selected>ATIVO</option>
                    <option>INATIVO</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="status">Perfil</label>
                <select id="status" class="form-control" name="status" value="{{old('status')}}" >
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

    </formulario>

    <span slot="botoes">
        <button form="formAdicionar" type="submit" class="btn btn-primary">Gravar</button>
    </span>
</modal>



<modal id="editar" nome="editar" titulo="Cadastro de Usuários - ALTERAR">
    <formulario id="formEditar" css="" action="#" method="put" enctype="multipart/form-data" token="12345">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="altusunome">Login</label>
                <input type="text" class="form-control" id="altusunome" v-model="$store.state.item.usunome" placeholder="Login">
            </div>
            <div class="form-group col-md-6">
                <label for="altususenha">Senha</label>
                <input type="password" class="form-control" id="altususenha" v-model="$store.state.item.ususenha" placeholder="Senha">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="altnome">Nome</label>
                <input type="text" class="form-control" id="altnome" v-model="$store.state.item.nome" placeholder="Nome">
            </div>

            <div class="form-group col-md-6">
                <label for="altsituacao">Situação</label>
                <select id="altsituacao" class="form-control" v-model="$store.state.item.situacao">
                    <option selected>ATIVO</option>
                    <option>INATIVO</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="altstatus">Perfil</label>
                <select id="altstatus" class="form-control" v-model="$store.state.item.status">
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
    </formulario>
    <span slot="botoes">
        <button form="formEditar" type="submit" class="btn btn-primary">Gravar</button>
    </span>
</modal>


@endsection