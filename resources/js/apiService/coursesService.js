import request from "./axiosConfig";

const courses = {
    async getListCourses () {
        let response = await request.get('/courses')
        return response.data
    },
    async search (keyword) {
        let response = await request.post('/courses/search', {
            keyword
        })
        return response.data
    },
    async searchSelect(level, categogy) {
        let response = await request.post('/courses/searchSelect', {
            level,
            categogy
        })
        return response.data
    }
}

export default courses;