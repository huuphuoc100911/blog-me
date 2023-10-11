import axiosAPI from ".";

export const getAmountUserApi = () => {
    return axiosAPI.get("/api/v1/amount-user");
};

export const getAmountMediaApi = () => {
    return axiosAPI.get("/api/v1/amount-media");
};

export const getAmountBlogApi = () => {
    return axiosAPI.get("/api/v1/amount-blog");
};
