import {
    getAmountBlogApi,
    getAmountMediaApi,
    getAmountUserApi,
} from "../../api/amount";

const state = () => {
    return {
        amountUser: {},
        amountMedia: {},
        amountBlog: {},
    };
};

const mutations = {
    setAmountUserMutation(state, payload) {
        state.amountUser = payload;
    },
    setAmountMediaMutation(state, payload) {
        state.amountMedia = payload;
    },
    setAmountBlogMutation(state, payload) {
        state.amountBlog = payload;
    },
};

const actions = {
    async getAmountUserAction(context, payload) {
        const data = await getAmountUserApi(payload);
        context.commit("setAmountUserMutation", data);
    },
    async getAmountMediaAction(context, payload) {
        const data = await getAmountMediaApi(payload);
        context.commit("setAmountMediaMutation", data);
    },
    async getAmountBlogAction(context, payload) {
        const data = await getAmountBlogApi(payload);
        context.commit("setAmountBlogMutation", data);
    },
};

export default {
    namespaced: true,
    state,
    mutations,
    actions,
};
