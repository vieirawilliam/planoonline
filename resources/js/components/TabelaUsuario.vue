<template>    
    <div class="">
      
            <div class="form-inline">        
                <a v-if="criar && !modal" :href="criar" >Novo</a> 
                <modallink v-if="criar && modal" tipo="button" nome="adicionar" titulo="Novo" css=""></modallink>                
                <div class="form-group pull-right" >
                    <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
                </div>
            </div>

            <table class="table table-striped table-hover">
                
                <thead class="thead-dark">
                    <tr>
                        <th style="cursor:pointer" v-on:click="ordenaColuna(index)" v-for="(titulo,index) in titulos" :key="index"> {{ titulo }} </th>
                    
                        <th v-if="detalhe || editar || deletar">Ação</th>
                    </tr>                    
                </thead>
                
                <tbody>
                    <tr v-for="(item,index) in lista" :key="index">
                        <td v-for="(i,index) in item" :key="index"> {{ i | subStr | upper }} </td>
                        
                        <td v-if="detalhe || editar || deletar" >                            
                            <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar + item.id" method="post">
                                
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" v-bind:value="token">
                                
                                <a v-if="detalhe" v-bind:href="editar">Detalhe |</a>
                                <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
                                <modallink v-if="editar && modal" :item="item" :url="editar" tipo="link" nome="editar" titulo="Editar |" css=""></modallink> 

                                <a href="#" v-on:click="executaForm(index)"> Deletar</a>
                            </form>

                            <span v-if="!token">
                                <a v-if="detalhe" v-bind:href="editar">Detalhe |</a>
                                <a v-if="editar && !modal" v-bind:href="editar">Editar |</a>
                                <modallink v-if="editar && modal" :item="item" :url="editar" tipo="link" nome="editar" titulo="Editar |" css=""></modallink> 

                                <a v-if="deletar" v-bind:href="deletar">Deletar </a>
                            </span>

                            <span v-if="token && !deletar">
                                <a v-if="detalhe" v-bind:href="editar">Detalhe |</a>
                                <a v-if="editar && !modal" v-bind:href="editar">Editar </a>
                                <modallink v-if="editar && modal" :item="item" :url="editar" tipo="link" nome="editar" titulo="Editar " css=""></modallink> 

                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>    
        </div>
</template>

<script>
    export default {
        props:['titulos','itens','ordem','ordemCol','criar','detalhe','editar','deletar','token','modal'],
        data: function(){
            return{
                buscar:'',
                ordemAux: this.ordem || "asc",
                ordemAuxCol: this.ordemCol || 0
            }
        },
        filters: {
  	        subStr: function(string) {
                if (string != null){
                    return string.toString().substring(0,22);
                }            
            },
            upper: function (value) {
                if (!value) return ''
                value = value.toString()
                return value.toUpperCase()
            }
        }
        ,
        methods:{
            executaForm: function(index){
                document.getElementById(index).submit();
            },            
            ordenaColuna: function(coluna){
                this.ordemAuxCol = coluna;
                if(this.ordemAux.toLowerCase() =="asc"){
                    this.ordemAux = 'desc';
                }else{
                    this.ordemAux = 'asc';
                }   
            }
        },
        computed:{
            lista:function(){
                
                let lista = this.itens.data;
                let ordem = this.ordemAux ;
                let ordemCol = this.ordemAuxCol;

                ordem = ordem.toLowerCase();
                ordemCol = parseInt(ordemCol);

                if(ordem == "asc"){
                    lista.sort(function(a,b){
                    if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol] ) { return 1;}
                    if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol] ) { return -1;}
                    return 0;   
                });
                }else{
                    lista.sort(function(a,b){
                    if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol] ) { return 1;}
                    if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol] ) { return -1;}
                    return 0;
                });
                }

                if(this.buscar){
                    return lista.filter(res => {                    
                    res = Object.values(res);
                    for(let k = 0;k < res.length; k++){
                        if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                            return true;
                            }
                        }
                        return false;
                    });
                }
                return lista;
            }
        }
    }

</script>
