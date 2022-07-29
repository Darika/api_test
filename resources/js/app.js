/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.VueScrollTo = require('vue-scrollto');


import VueRouter from 'vue-router';
import BootstrapVue from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

window.Vue.use(VueRouter);
Vue.config.devtools = true;
Vue.use(BootstrapVue);

import AdsIndex from './components/AdsIndex.vue';
import AdsCreate from './components/AdsCreate.vue';
import AdsShow from "./components/AdsShow.vue";

const routes = [
    {path: '/', component: AdsIndex},
    {path: '/create', component: AdsCreate, name: 'AdsCreate', props: true},
    {path: '/show/:id', component: AdsShow, name: 'AdsShow', props: true},
];

const router = new VueRouter({ routes });

const app = new Vue({ router }).$mount('#app');
