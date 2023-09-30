import { createStore } from "vuex";
import media from "./modules/media";
import category from "./modules/category";
import staff from "./modules/staff";
import infoCompany from "./modules/info-company";
import amount from "./modules/amount";

export default createStore({
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    modules: {
        media,
        category,
        staff,
        infoCompany,
        amount,
    },
});
