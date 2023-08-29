import { createSlice } from "@reduxjs/toolkit";

const initialState = {}

const form = createSlice({
    name:'form',
    initialState:initialState,
    reducers:{
        setListInput(state,action) {
            state[action.payload.key] = action.payload.value
        },
        resetState() {
            return initialState
        }
    }
})

export const { setListInput, resetState } = form.actions
export default form.reducer