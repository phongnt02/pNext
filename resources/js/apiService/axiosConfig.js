import axios from "axios";
import Cookies from 'js-cookie';

const csrfToken = Cookies.get('XSRF-TOKEN');
const request = axios.create({
    baseURL:'http://localhost/api/',
    headers:{
        // 'Authorization':`Bearer ${token}`,
        'Accept':'application/json',
        'Content-Type' : 'application/json',
        'X-CSRF-TOKEN': csrfToken, // Đặt giá trị của mã CSRF vào header của yêu cầu
        'X-Requested-With': 'XMLHttpRequest',
    }
})

export default request