import { createRouter, createWebHistory } from "vue-router";
import HomePage from "./components/Home.vue";
import Countries from "./components/Pages/Countries.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/",
            component: HomePage,
        },
        {
            path: "/country/:country",
            component: Countries,
        },
    ],
});

export default router;
