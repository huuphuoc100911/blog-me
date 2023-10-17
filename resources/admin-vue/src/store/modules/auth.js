import { signInAPI } from "../../api/auth";

const state = () => {
    return {
        adminLogin: {},
    };
};

const mutations = {
    setUserLoginMutation(state, payload) {
        state.adminLogin = payload.adminLogin;
        console.log(payload);
        localStorage.setItem(
            "adminLogin",
            JSON.stringify(payload.access_token)
        );
    },
    loadAdminLoginFromLocalStorage(state, payload) {
        state.adminLogin = payload.adminLogin;
    },
    setAdminLogOutMutation(state, payload) {
        state.adminLogin = {};
    },
};

const actions = {
    async signInAction({ commit }, { data, router }) {
        try {
            console.log(21333333);
            const userLogin = await signInAPI(data);
            console.log(userLogin);
            if (userLogin.status_code == 200) {
                commit("setUserLoginMutation", userLogin);
                router.push("/admin-vue");
            } else {
                alert("tài khoản hoặc mất khẩu không chính xác");
            }
        } catch (error) {
            alert("tài khoản hoặc mất khẩu không chính xác");
        }
    },
    loadUserLoginFromLocalStorageAction({ commit }) {
        let adminLogin = {};
        if (localStorage.getItem("adminLogin")) {
            adminLogin = JSON.parse(localStorage.getItem("adminLogin"));
        }
        commit("loadAdminLoginFromLocalStorage", adminLogin);
    },
    signUpAction({ commit }, { router }) {
        localStorage.removeItem("adminLogin");
        commit("setAdminLogOutMutation");
        router.push("/admin-vue/sign-in");
    },
};

export default {
    namespaced: true,
    state,
    mutations,
    actions,
};
