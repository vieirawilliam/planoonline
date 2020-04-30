@extends('layout.site')
@section('titulo', 'Clientes MPLAN')

@section('conteudo')
<div class="container">
    <h3 class="center">Lista de usuarios MPLAN</h3>

    <div class="row">
        <table>
            <thead>
                <div class="row">
                    <a class="btn blue" href="">Novo</a>
                </div>
                <tr>
                    <th>ID</th>
                    <th>USUCOD</th>
                    <th>USUNOME</th>
                    <th>STATUS</th>                    
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tblusus as $tblusu)
                <tr>
                    <td> {{ $tblusu->id }} </td>
                    <td> {{ $tblusu->usucod }} </td>
                    <td> {{ $tblusu->usunome }} </td>
                    <td> {{ $tblusu->status }} </td>
                    <td>
                        <a class="btn deep-orange" href=" ">Editar</a>
                        <a class="btn red" href="  ">Deletar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection