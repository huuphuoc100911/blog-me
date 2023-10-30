import { createStore } from "vuex";
import auth from "./modules/auth";
import media from "./modules/media";
import category from "./modules/category";

export default createStore({
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    modules: {
        auth,
        media,
        category,
    },
});
