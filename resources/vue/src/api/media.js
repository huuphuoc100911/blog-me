import axiosAPI from ".";

export const getListMediaApi = () => {
    return axiosAPI.get("/api/medias");
};
