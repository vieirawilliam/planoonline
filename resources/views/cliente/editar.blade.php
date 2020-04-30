@extends('layout.site')
@section('titulo', 'Clientes MPLAN')

@section('conteudo')
<div class="container">
    <h3 class="center">Editar Clientes</h3>
    
    <div class="row">
        <form class="" action="{{route('admin.clientes.atualizar', $clientes->id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="hidden" name="_method" value="put">
            @include('cliente._form')

            <button class="btn blue"> Atualizar </button>

        </form>
    </div>
</div>
@endsection