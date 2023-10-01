import axiosAPI from ".";

export const getListCategoryApi = () => {
    return axiosAPI.get("/api/categories");
};

export const getCategoryApi = (categoryId) => {
    return axiosAPI.get(`/api/category/${categoryId}`);
};
