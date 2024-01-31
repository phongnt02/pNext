import { createSlice } from "@reduxjs/toolkit";

const initialState = {
    isLogged : null,
    token : null,
    user_name : null
}

const auth = createSlice({
    name:'auth',
    initialState:initialState,
    reducers : {
        setInforLogin(state, action) {
            const data = action.payload
            state.isLogged = data.isLogged ?? null
            state.token = data.token ?? null
            state.user_name = data.user_name ?? null
        },
    }
});


export const { setInforLogin, setInforUser } = auth.actions;
export default auth.reducer