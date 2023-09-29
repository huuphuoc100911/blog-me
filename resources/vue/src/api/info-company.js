import axiosAPI from ".";

export const getInfoCompanyApi = () => {
    return axiosAPI.get("/api/info-company");
};
