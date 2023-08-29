import { createSlice } from "@reduxjs/toolkit";

const initialState = {
    isLogged : null,
    token : null,
    user : {
        name : null,
        email : null,
    }
}

const auth = createSlice({
    name:'login',
    initialState:initialState,
    reducers : {
        setInforLogin(state, action) {
            const data = action.payload
            state.isLogged = data.isLogged
            state.token = data.token
        },
        setInforUser(state, action) {
            const data = action.payload
            state.user.name = data.name
            state.user.email = data.email
        }
    }
});


export const { setInforLogin, setInforUser } = auth.actions;
export default auth.reducer