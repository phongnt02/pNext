import request from "./axiosConfig";

const auth = {
    async loginWithAccount(user_name, password) {
        let response = await request.post('/login', {
            user_name,
            password
        })
        return response.data
    },

    async registerAccount(full_name, email, dob, phone, user_name, password) {
        let response = await request.post('register', {
            full_name,
            email,
            dob,
            phone,
            user_name,
            password
        })
        return response.data
    }
}

export default auth;