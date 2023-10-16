import { signInAPI } from "../../api/auth";

const state = () => {
    return {
        isAuthenticated: false,
        adminLogin: {},
    };
};

const mutations = {
    setUserLoginMutation(state, payload) {
        state.isAuthenticated = payload.isAuthenticated;
        state.adminLogin = payload.adminLogin;
        localStorage.setItem("adminLogin", JSON.stringify(payload));
    },
    loadAdminLoginFromLocalStorage(state, payload) {
        state.adminLogin = payload.adminLogin;
    },
    setAdminLogOutMutation(state, payload) {
        state.adminLogin = {};
        state.isAuthenticated = false;
    },
};

const actions = {
    async signInAction({ commit }, { data, router }) {
        try {
            const userLogin = await signInAPI(data);
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
