import { getListMediaApi } from "../../api/media";

const state = () => {
    return {
        listMedia: {},
    };
};

const mutations = {
    setListMediaMutation(state, payload) {
        state.listMedia = payload;
    },
};

const actions = {
    async getListMediaAction(context, payload) {
        const data = await getListMediaApi(payload);
        context.commit("setListMediaMutation", data);
    },
};

export default {
    namespaced: true,
    state,
    mutations,
    actions,
};
