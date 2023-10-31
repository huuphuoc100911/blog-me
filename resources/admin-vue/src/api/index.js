import configs from "../configs";
import axios from "axios";

const axiosAPI = axios.create({
    baseURL: configs.baseURL,
    headers: {
        Accept: "application/json",
    },
});

// Add a request interceptor
axiosAPI.interceptors.request.use(
    function (config) {
        const token = localStorage.getItem("_token") ?? "";
        config.headers.Authorization = token ? `Bearer ${token}` : "";

        return config;
    },
    function (error) {
        // Do something with request error
        return Promise.reject(error);
    }
);

axiosAPI.interceptors.response.use(
    function (response) {
        return response.data;
    },
    function (error) {
        // Any status codes that falls outside the range of 2xx cause this function to trigger
        // Do something with response error
        return Promise.reject(error);
    }
);

export default axiosAPI;
