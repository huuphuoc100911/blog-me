import axiosAPI from ".";

export const getListMediaApi = (response) => {
    return axiosAPI.get(`/api/medias?page=${response.page}`);
};

export const getMediaCategoryApi = (response) => {
    return axiosAPI.get(
        `/api/categories/${response.categoryId}?page=${response.page}`
    );
};
