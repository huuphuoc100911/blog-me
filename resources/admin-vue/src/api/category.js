import axiosAPI from ".";

export const getListCategoryApi = () => {
    return axiosAPI.get("/api/v1/categories");
};
