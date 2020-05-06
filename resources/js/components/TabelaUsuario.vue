<template>    
    <div class="">
        <a v-if="criar" v-bind:href="criar">Novo</a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th v-for="(titulo,index) in titulos" :key="index"> {{ titulo }} </th>
                    
                        <th v-if="detalhe || editar || deletar">Ação</th>
                    </tr>                    
                </thead>
                <tbody>
                    <tr v-for="(item,index) in itens" :key="index">
                        <td v-for="(i,index) in item" :key="index"> {{ i }} </td>
                        
                        <td v-if="detalhe || editar || deletar" >                            
                            <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
                                
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" v-bind:value="token">
                                
                                <a v-if="detalhe" v-bind:href="editar">Detalhe |</a>
                                <a v-if="editar" v-bind:href="editar">Editar |</a>
                                <a v-if="deletar" v-bind:href="deletar">Deletar |</a>

                                <a href="#" v-on:click="executaform(index)"></a>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>    
        </div>
</template>

<script>
    export default {
        props:['titulos','itens','criar','detalhe','editar','deletar','token'],
        methods:{
            executaform: function(index){
                document.getElementByID('id').submit();
            }
        }
    }

</script>
