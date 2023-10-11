import axiosAPI from ".";

export const getListStaffApi = () => {
    return axiosAPI.get("/api/v1/staffs");
};
