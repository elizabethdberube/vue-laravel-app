import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./../Pages/HomeRoute.vue"),
    },
    {
        path: "/api/tasks",
        component: () => import("./../Pages/TaskRoute.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});