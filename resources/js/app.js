require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from './api/users';
import App from './components/App'
import Login from './components/Login'
import Home from './components/Home'
import Users from './components/Users'
import UsersRole from './components/UsersRole'
import RolesUser from './components/RolesUser'
import store from './store'

Vue.prototype.$http = axios;
Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            redirect: '/login'
        },
        {
            path: '/home',
            name: 'Home',
            component: Home
        },
        {
            path: '/users',
            name: 'Users',
            component: Users
        },
        {
            path: '/usersrole',
            name: 'UsersRole',
            component: UsersRole
        },
        {
            path: '/rolesuser',
            name: 'RolesUser',
            component: RolesUser
        },
        {
            path: '/login',
            name: 'Login',
            component: Login
        }
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store
});