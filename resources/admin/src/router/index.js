import { createRouter, createWebHistory } from "vue-router";

import Company from "../pages/Company";
import School from "../pages/School";

const routes = [
    {
        path: "/vue/company",
        name: "Company",
        component: Company,
    },
    {
        path: "/vue/school",
        name: "School",
        component: School,
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
