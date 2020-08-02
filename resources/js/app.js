require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import { LayoutPlugin } from 'bootstrap-vue'

Vue.use(VueRouter)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(LayoutPlugin)



import routes from './router'

Vue.component('navigation', require('./components/Navigation').default);
const app = new Vue({
    el: '#app',
    router: new VueRouter(routes),
});