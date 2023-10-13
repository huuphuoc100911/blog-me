import { createRouter, createWebHistory } from "vue-router";
import routes from "./router";

export default createRouter({
    history: createWebHistory(),
    routes,
});
