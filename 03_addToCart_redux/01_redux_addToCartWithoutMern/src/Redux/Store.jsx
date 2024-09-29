import { configureStore } from "@reduxjs/toolkit"
import cartReducer from "./CartSlice"

import blogReducer from "./BlogSlice"

const store = configureStore({
    reducer  : {
        cart : cartReducer, 
        blog : blogReducer
    }
})

export default store