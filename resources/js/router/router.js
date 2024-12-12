import { createRouter, createWebHistory } from "vue-router";

import HomeRoute from './Pages/HomeRoute.vue'
import TestRoute from './Pages/TestRoute.vue'

const routes = [
    {
        path: "/",
        component: () => import("./Pages/HomeRoute.vue"),
    },
    {
        path: "/test",
        component: () => import("./Pages/TestRoute.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});