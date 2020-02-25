require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
Vue.use(Vuetify)
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'


Vue.component('chat-app', require('./components/ChatApp.vue').default);



const app = new Vue({
    el: '#backend',
});