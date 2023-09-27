import axios from "axios";

const instance = axios.create({
    baseURL: import.meta.env.VUE_APP_URL_API,
    withCredentials: true,
    headers:{
        'X-Requested-With': 'XMLHttpRequest',
        'Content-Type': 'application/json',
    }

})

export default instance;
