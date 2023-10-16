import axiosAPI from ".";

export const signInAPI = (userLogin) => {
    return axiosAPI.post("/api/v1/admin-vue/login", userLogin);
};
