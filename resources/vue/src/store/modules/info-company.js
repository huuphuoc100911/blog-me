import { getInfoCompanyApi } from "../../api/info-company";

const state = () => {
    return {
        infoCompany: {},
    };
};

const mutations = {
    setInfoCompanyMutation(state, payload) {
        state.infoCompany = payload.data[0];
    },
};

const actions = {
    async getInfoCompanyAction(context, payload) {
        const data = await getInfoCompanyApi(payload);
        context.commit("setInfoCompanyMutation", data);
    },
};

export default {
    namespaced: true,
    state,
    mutations,
    actions,
};
