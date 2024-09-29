import { createAsyncThunk, createSlice } from "@reduxjs/toolkit"
import axios from "axios";

// Fetch all blogs
export const fetchBlogs = createAsyncThunk('blogs/fetchBlogs', async () => {
    const response = await axios.get("http://localhost:3001/question2/blog/")
    return response.data.value;
  });
  
  // Add a new blog
  export const addBlog = createAsyncThunk('blogs/addBlog', async (blog) => {
    const response = await axios.post("http://localhost:3001/question2/blog/", blog)
    return response.data.value;
  });
  
  // Remove a blog
  export const removeBlog = createAsyncThunk('blogs/removeBlog', async (id) => {
    await axios.delete(`http://localhost:3001/question2/blog/${id}`)
    return id;
  });

const blogSlice = createSlice({
    name : "blogs", 
    initialState : {
        blogRedux:[],
        status: null
    },
    // extraReducers: {
    //     [fetchBlogs.pending]: (state) => {
    //       state.status = 'loading';
    //     },
    //     [fetchBlogs.fulfilled]: (state, { payload }) => {
    //       state.blogs = payload;
    //       state.status = 'success';
    //     },
    //     [fetchBlogs.rejected]: (state) => {
    //       state.status = 'failed';
    //     },
    //     [addBlog.fulfilled]: (state, { payload }) => {
    //       state.blogs.push(payload);
    //     },
    //     [removeBlog.fulfilled]: (state, { payload }) => {
    //       state.blogs = state.blogs.filter((blog) => blog._id !== payload);
    //     },
    //   },
 reducers: {},
  extraReducers: (builder) => {
    builder
      // Fetch blogs
      .addCase(fetchBlogs.pending, (state) => {
        state.status = 'loading';
      })
      .addCase(fetchBlogs.fulfilled, (state, { payload }) => {
        state.blogRedux = payload;
        state.status = 'success';
      })
      .addCase(fetchBlogs.rejected, (state) => {
        state.status = 'failed';
      })
      // Add blog
      .addCase(addBlog.fulfilled, (state, { payload }) => {
        state.blogRedux.push(payload);
      })
      // Remove blog
      .addCase(removeBlog.fulfilled, (state, { payload }) => {
        state.blogRedux = state.blogRedux.filter((blog) => blog._id !== payload);
      });
  },
});


// export const { fetchBlog, addBlog, removeBlog } = blogSlice.actions
export default blogSlice.reducer