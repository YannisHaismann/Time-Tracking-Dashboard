import Vue from 'vue/dist/vue.js';
import axios from 'axios'
import VueAxios from 'vue-axios'

import Main from './vue/Main.vue'

Vue.use(VueAxios, axios);
Vue.component('main-vue', Main);

new Vue({
    el: '#app'
});