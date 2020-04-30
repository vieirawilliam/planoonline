<div class="input-field" >
    <input type="text" name="cliente_name" value=" {{ isset($clientes->cliente_name) ? $clientes->cliente_name : '' }} ">
    <label>Nome</label>
</div>

<div class="input-field" >
    <input type="text" name="cliente_unidade_nome" value=" {{ isset($clientes->cliente_unidade_nome) ? $clientes->cliente_unidade_nome : '' }} ">
    <label>Descrição</label>
</div>

<div class="input-field" >
    <input type="email" name="cliente_email" value=" {{ isset($clientes->cliente_email) ? $clientes->cliente_email : '' }} ">
    <label>Email</label>
</div>

<div class="input-field" >
    <input type="text" name="cliente_ip" value=" {{ isset($clientes->cliente_ip) ? $clientes->cliente_ip : '' }} ">
    <label>IP</label>
</div>

<div class="input-field" >
    <input type="text" name="cliente_porta" value=" {{ isset($clientes->cliente_porta) ? $clientes->cliente_porta : '' }} ">
    <label>Porta</label>
</div>

<div class="input-field" >
    <input type="text" name="cliente_tabela" value=" {{ isset($clientes->cliente_tabela) ? $clientes->cliente_tabela : '' }} ">
    <label>Tabela</label>
</div>  

<div class="input-field" >
    <input type="text" name="cliente_unidade" value=" {{ isset($clientes->cliente_unidade) ? $clientes->cliente_unidade : '0' }} ">
    <label>Código da Unidade</label>
</div>  

<br>
