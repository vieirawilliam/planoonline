@extends('layout.site')
@section('titulo', 'Clientes MPLAN')

@section('conteudo')
<div class="container content-center-curso">
    <h3 class="center">Adicionar Clientes</h3>
    
    <div class="row">
        <form class="" action="{{route('admin.clientes.salvar')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            @include('cliente._form')

            <button class="btn blue"> Salvar </button>

        </form>
    </div>
</div>
@endsection