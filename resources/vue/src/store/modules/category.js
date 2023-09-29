import { getListCategoryApi } from "../../api/category";

const state = () => {
    return {
        listCategory: {},
    };
};

const mutations = {
    setListCategoryMutation(state, payload) {
        state.listCategory = payload;
    },
};

const actions = {
    async getListCategoryAction(context, payload) {
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
