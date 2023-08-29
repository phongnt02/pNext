import request from "./axiosConfig"

const homeService = {
    async getDataDefault () {
        let response = await request.get('/home')
        return response.data
    }
}
export default homeService