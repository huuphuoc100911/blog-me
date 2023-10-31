import axiosAPI from ".";

export const getListMediaApi = () => {
    return axiosAPI.get("api/v1/admin-vue/media");
};

export const postMediaApi = (data) => {
    return axiosAPI.post("api/v1/admin-vue/media", data);
};

export const deleteMediaApi = (mediaId) => {
    return axiosAPI.delete(`api/v1/admin-vue/media/${mediaId}`);
};

export const getMediaApi = (id) => {
    console.log(axiosAPI.get(`api/v1/admin-vue/media/${id}/edit`));
    return axiosAPI.get(`api/v1/admin-vue/media/${id}/edit`);
};
