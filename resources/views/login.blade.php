
<div class="content-center">
    <h3 class="center">Login</h3>
    
    <div class="container">
        <form class="" action="{{route('login.login')}}" method="post">
            {{ csrf_field() }}

         
            <div class="input-field" >
                <input type="text" name="usunome" >
                <label>Usuário</label>
            </div>

            <div class="input-field" >
                <input type="password" name="ususenha" >
                <label>Senha</label>
            </div>

            <button class="btn blue"> Entrar </button>

        </form>
    </div>
</div>
