import Vue from "vue"
import Router from "vue-router"
Vue.use(Router)

import login from "./components/login.vue"
import register from "./components/register.vue"

import dashboard from "./users/pages/dashboard.vue"
import dictonary from "./users/pages/dictonary.vue"



const routes = [
    {
        path: "/login",
        component: login,
        name: '/login'
    },
    {
        path: "/register",
        component: register,
        name: '/register'
    },
    
    {
        path: "/",
        component: dashboard,
        name: '/'
    },
    {
        path: "/dictonary",
        component: dictonary,
        name: '/dictonary'
    },
    
]

export default new Router({
    mode: "history",
    routes
})
