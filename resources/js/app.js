require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import DashboardComponent from './components/Dashboard.vue'
import IndexComponent from './components/products/Index.vue';
import CreateComponent from './components/products/Create.vue';
import EditComponent from './components/products/Edit.vue';

const routes = [
    {
        name: 'dashboard',
        path: '/',
        component: DashboardComponent
    },
    {
        name: 'products',
        path: '/products',
        component: IndexComponent
    },
    {
        name: 'create',
        path: '/products/create',
        component: CreateComponent
    },
    {
        name: 'edit',
        path: '/products/edit/:id',
        component: EditComponent
    }
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');