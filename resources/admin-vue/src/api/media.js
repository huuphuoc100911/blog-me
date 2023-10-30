import axiosAPI from ".";

export const getListMediaApi = () => {
    return axiosAPI.get("api/v1/admin-vue/media");
};

export const postMediaApi = (data) => {
    return axiosAPI.post("api/v1/admin-vue/media", data);
};
