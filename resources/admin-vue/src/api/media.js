import axiosAPI from ".";

export const getListMediaApi = () => {
    return axiosAPI.get("api/v1/admin-vue/media");
};

export const postMediaApi = (data) => {
    return axiosAPI.post("api/v1/admin-vue/media", data);
};

export const getMediaApi = (id) => {
    console.log(axiosAPI.get(`api/v1/admin-vue/media/${id}/edit`));
    return axiosAPI.get(`api/v1/admin-vue/media/${id}/edit`);
};
