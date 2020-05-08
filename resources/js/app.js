import './bootstrap';

window.Vue = require('vue');

Vue.component('example', require('./components/Example.vue'));
Vue.component('topo', require('./components/Topo.vue'));
Vue.component('painel', require('./components/Painel.vue'));
Vue.component('pagina', require('./components/Pagina.vue'));
Vue.component('tabela-usuario',require('./components/TabelaUsuario.vue'));
Vue.component('migalhas',require('./components/Migalhas.vue'));

const app = new Vue({
    el: '#app'
});