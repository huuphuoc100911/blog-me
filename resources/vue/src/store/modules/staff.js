import { getListStaffApi } from "../../api/staff";

const state = () => {
    return {
        listStaff: {},
    };
};

const mutations = {
    setListStaffMutation(state, payload) {
        state.listStaff = payload;
    },
};

const actions = {
    async getListStaffAction(context, payload) {
        const data = await getListStaffApi(payload);
        context.commit("setListStaffMutation", data);
    },
};

export default {
    namespaced: true,
    state,
    mutations,
    actions,
};
