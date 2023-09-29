import axiosAPI from ".";

export const getListCategoryApi = () => {
    return axiosAPI.get("/api/categories");
};
