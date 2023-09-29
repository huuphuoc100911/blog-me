import { createStore } from "vuex";
import media from "./modules/media";
import category from "./modules/category";
import staff from "./modules/staff";

export default createStore({
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    modules: {
        media,
        category,
        staff,
    },
});
