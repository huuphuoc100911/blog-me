import axiosAPI from ".";

export const getListMediaApi = () => {
    return axiosAPI.get("/api/medias");
};

export const getMediaCategoryApi = (categoryId) => {
    return axiosAPI.get(`/api/categories/${categoryId}`);
};
