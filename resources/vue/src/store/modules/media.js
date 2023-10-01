import { getListMediaApi, getMediaCategoryApi } from "../../api/media";

const state = () => {
    return {
        listMedia: {},
        listMediaCategory: {},
    };
};

const mutations = {
    setListMediaMutation(state, payload) {
        state.listMedia = payload;
    },
    setListMediaCategoryMutation(state, payload) {
        state.listMediaCategory = payload;
    },
};

const actions = {
    async getListMediaAction(context, payload) {
        const data = await getListMediaApi(payload);
        context.commit("setListMediaMutation", data);
    },

    async getListMediaCategoryAction(context, payload) {
        const data = await getMediaCategoryApi(payload);
        context.commit("setListMediaCategoryMutation", data);
    },
};

export default {
    namespaced: true,
    state,
    mutations,
    actions,
};
