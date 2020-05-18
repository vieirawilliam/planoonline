import './bootstrap';

window.Vue = require('vue');

import Vuex from 'Vuex';
Vue.use(Vuex);

const store = new Vuex.Store({
    state:{
        item:{}
    },
    mutations:{
        setItem(state,obj){
            state.item=obj;
        }
    }
});

Vue.component('example', require('./components/Example.vue').default);
Vue.component('topo', require('./components/Topo.vue').default);
Vue.component('painel', require('./components/Painel.vue').default);
Vue.component('pagina', require('./components/Pagina.vue').default);
Vue.component('tabela-usuario',require('./components/TabelaUsuario.vue').default);
Vue.component('migalhas',require('./components/Migalhas.vue').default);
Vue.component('modal',require('./components/modal/Modal.vue').default);
Vue.component('modallink',require('./components/modal/ModalLink.vue').default);
Vue.component('formulario',require('./components/Formulario.vue').default);

const app = new Vue({
    el: '#app',
    store,
    mounted:function(){
        document.getElementById('app').style.display ="block";
    }
});