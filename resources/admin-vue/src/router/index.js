import { createRouter, createWebHistory } from "vue-router";
import routes from "./router";
import store from "../store";

export const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    // you could define your own authentication logic with token
    let isAuthenticated = localStorage.getItem("adminLogin");

    // check route meta if it requires auth or not
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (!isAuthenticated) {
            next({
                path: "/admin-vue/sign-in",
                params: { nextUrl: to.fullPath },
            });
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;
