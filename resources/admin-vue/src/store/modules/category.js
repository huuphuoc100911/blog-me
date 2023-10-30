import { getListCategoryApi } from "../../api/category";

const state = () => {
    return {
        listCategory: {},
        errors: {},
    };
};

const mutations = {
    setListCategoryMutation(state, payload) {
        state.listCategory = payload;
    },
    ADD_ERRORS(state, payload) {
        state.errors = payload;
    },
};

const actions = {
    async getListCategoryAction(context, payload) {
        console.log(21333333333333);
        const data = await getListCategoryApi(payload);
        context.commit("setListCategoryMutation", data);
    },
};

export default {
    namespaced: true,
    state,
    mutations,
    actions,
};
