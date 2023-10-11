import axiosAPI from ".";

export const getInfoCompanyApi = () => {
    return axiosAPI.get("/api/v1/info-company");
};
