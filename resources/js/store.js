import { configureStore } from "@reduxjs/toolkit";
import auth from './ReduxToolkit/authSlice';
import form from './ReduxToolkit/formSlice'

const store = configureStore({
    reducer: {
        auth,
        form
    }
});

export default store