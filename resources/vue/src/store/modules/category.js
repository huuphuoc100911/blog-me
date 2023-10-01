import { getCategoryApi, getListCategoryApi } from "../../api/category";

const state = () => {
    return {
        listCategory: {},
        categoryInfo: {},
    };
};

const mutations = {
    setListCategoryMutation(state, payload) {
        state.listCategory = payload;
    },
    setCategoryInfoMutation(state, payload) {
        state.categoryInfo = payload;
    },
};

const actions = {
    async getListCategoryAction(context, payload) {
        const data = await getListCategoryApi(payload);
        context.commit("setListCategoryMutation", data);
    },
    async getCategoryInfoAction(context, payload) {
        const data = await getCategoryApi(payload);
        context.commit("setCategoryInfoMutation", data);
    },
};

export default {
    namespaced: true,
    state,
    mutations,
    actions,
};
