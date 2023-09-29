import axiosAPI from ".";

export const getListStaffApi = () => {
    return axiosAPI.get("/api/staffs");
};
