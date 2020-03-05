/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import HomeComponent from './components/views/HomeComponent.vue';
import NewsComponent from './components/views/NewsComponent.vue';
import NewsTypesComponent from './components/views/NewsTypesComponent.vue';
import UsersComponent from './components/views/UsersComponent.vue';
import RolesComponent from './components/views/RolesComponent.vue';
import GroupsComponent from './components/views/GroupsComponent.vue';

const router = new VueRouter({
    mode:'history',
    routes:[
        {
            path: '/home',
            name: 'homeIndex',
            component: HomeComponent
        },
        {
            path: '/news',
            name: 'newsIndex',
            component: NewsComponent
        },
        {
            path: '/news-types',
            name: 'newsIndex',
            component: NewsTypesComponent
        },
        {
            path: '/users',
            name: 'newsIndex',
            component: UsersComponent
        },
        {
            path: '/roles',
            name: 'newsIndex',
            component: RolesComponent
        },
        {
            path: '/groups-parameters',
            name: 'newsIndex',
            component: GroupsComponent
        }
    ]
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('header-main', require('./components/HeaderComponent.vue').default);
Vue.component('sidebar-main', require('./components/SidebarComponent.vue').default);
Vue.component('aside-main', require('./components/AsideComponent.vue').default);
Vue.component('footer-main', require('./components/FooterComponent.vue').default);

// Vue.component('home', require('./components/HomeComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
