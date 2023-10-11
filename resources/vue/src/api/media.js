import axiosAPI from ".";

export const getListMediaApi = (response) => {
    return axiosAPI.get(`/api/v1/medias?page=${response.page}`);
};

export const getMediaCategoryApi = (response) => {
    return axiosAPI.get(
        `/api/v1/categories/${response.categoryId}?page=${response.page}`
    );
};
