import Layout from "../components/base/TheBody.vue";
import Home from "../pages/Home.vue";
import CreateMedia from "../pages/media/CreateMedia.vue";
import SignIn from "../pages/auth/SignIn.vue";

const routes = [
    {
        path: "/admin-vue",
        component: Layout,
        children: [
            {
                path: "",
                name: "home",
                component: Home,
            },
            {
                path: "media/create",
                name: "media-create",
                component: CreateMedia,
            },
            { path: "*", redirec: "/" },
        ],
        meta: { requiresAuth: true },
    },
    {
        path: "/admin-vue/sign-in",
        name: "SignIn",
        component: SignIn,
        meta: { requiresAuth: false },
    },
];

export default routes;
