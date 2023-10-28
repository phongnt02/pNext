import axios from "axios";

const request = axios.create({
    baseURL:'http://localhost/api/',
    headers:{
        // 'Authorization':`Bearer ${token}`,
        'Accept':'application/json',
        'Content-Type' : 'application/json',
        'X-CSRF-TOKEN': window.csrfToken, 
        'X-Requested-With': 'XMLHttpRequest',
    }
})

export default request