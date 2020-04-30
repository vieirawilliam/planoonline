@extends('layout.site')
@section('titulo', 'Clientes MPLAN')

@section('conteudo')
<div class="container">
    <h3 class="center">Lista de Clientes MPLAN</h3>

    <div class="row">
        <table>
            <thead>
                <div class="row">
                    <a class="btn blue" href=" {{ route('admin.clientes.adicionar') }} ">Novo</a>
                </div>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descricao</th>
                    <th>Email</th>
                    <th>IP</th>
                    <th>Porta</th>
                    <th>Base</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td> {{ $cliente->id }} </td>
                    <td> {{ $cliente->cliente_name }} </td>
                    <td> {{ $cliente->cliente_unidade_nome }} </td>
                    <td> {{ $cliente->cliente_email }} </td>
                    <td> {{ $cliente->cliente_ip }} </td>
                    <td> {{ $cliente->cliente_porta }} </td>
                    <td> {{ $cliente->cliente_tabela }} </td>
                    <td>
                        <a class="btn deep-orange" href=" {{ route('admin.clientes.editar', $cliente->id) }} ">Editar</a>
                        <a class="btn red" href=" {{ route('admin.clientes.deletar', $cliente->id) }} ">Deletar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection