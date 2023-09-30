import axiosAPI from ".";

export const getAmountUserApi = () => {
    return axiosAPI.get("/api/amount-user");
};

export const getAmountMediaApi = () => {
    return axiosAPI.get("/api/amount-media");
};

export const getAmountBlogApi = () => {
    return axiosAPI.get("/api/amount-blog");
};
