import { getListMediaApi, postMediaApi } from "../../api/media";

const state = () => {
    return {
        listMedia: {},
        errors: {},
    };
};

const mutations = {
    setListMediaMutation(state, payload) {
        state.listMedia = payload;
    },
    ADD_ERRORS(state, payload) {
        state.errors = payload;
    },
};

const actions = {
    async getListMediaAction(context, payload) {
        const data = await getListMediaApi(payload);
        context.commit("setListMediaMutation", data);
    },

    async updateOrCreateMediaAction(context, payload) {
        let router = payload.router;
        await postMediaApi(payload.data)
            .then((res) => {
                console.log(res);
                if (res.status == 200) {
                    router.push(`/admin-vue/media`);
                }
            })
            .catch((error) => {
                context.commit("ADD_ERRORS", error.response.data.errors);
            });
    },
};

export default {
    namespaced: true,
    state,
    mutations,
    actions,
};
