import {
    deleteMediaApi,
    getListMediaApi,
    getMediaApi,
    postMediaApi,
} from "../../api/media";

const state = () => {
    return {
        listMedia: {},
        errors: {},
        mediaUpdate: {},
    };
};

const mutations = {
    setListMediaMutation(state, payload) {
        state.listMedia = payload;
    },
    setMediaMutation(state, payload) {
        state.mediaUpdate = payload;
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

    async getMediaAction(context, payload) {
        const data = await getMediaApi(payload);
        context.commit("setMediaMutation", data.data);
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
                console.log("loi");
                context.commit("ADD_ERRORS", error.response.data.errors);
            });
    },

    async deleteMediaAction(context, payload) {
        let router = payload.router;

        await deleteMediaApi(payload.mediaId)
            .then((res) => {
                if (res.status == 200) {
                    router.push(`/admin-vue/media`);
                }
            })
            .catch((error) => {
                console.log("loi");
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
