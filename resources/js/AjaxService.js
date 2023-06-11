import axios from "axios";

export const authClient = axios.create({
    baseURL: '',
    withCredentials: true, // required to handle the CSRF token
});

/*
 * Add a response interceptor
 */
authClient.interceptors.response.use(
    (response) => {
        return response;
    },
    function (error) {
        if (
            error.response &&
            [401, 419].includes(error.response.status)
        ) {
            // do something on a 401 or 419 error
        }
        return Promise.reject(error);
    }
);

export default {
    async updateStatus(payload) {
        await authClient.get("/sanctum/csrf-cookie");
        return authClient.post('/update-status', payload);
    },
};
