<template>
    <div v-bind:class="defineCor">
                    <div class="panel-heading">{{titulo}}</div>

                    <div class="panel-body">
                       <slot></slot>
                    </div>
                </div>
</template>

<script>
    export default {
        props:['titulo','cor'],
        computed:{
            defineCor: function(){
                return "panel " + (this.cor || "panel-default") ;
            }
        }
    }
</script>

<style media="screen">
        .blue {
        border-color: #0c2a96;
    }
    .blue    > .panel-heading {
        color: #fdfffd;
        background-color: #0c2a96;
        border-color: #0c2a96;
    }

     .orange {
        border-color: #ff6a00;
    }
    .orange    > .panel-heading {
        color: #fdfffd;
        background-color: #ff6a00;
        border-color: #ff6a00;
    }

</style>
