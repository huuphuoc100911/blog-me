import axiosAPI from ".";

export const getListCategoryApi = () => {
    return axiosAPI.get("/api/v1/categories");
};

export const getCategoryApi = (categoryId) => {
    return axiosAPI.get(`/api/v1/category/${categoryId}`);
};
