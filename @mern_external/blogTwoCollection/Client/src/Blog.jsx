import React, { useEffect, useState } from 'react'
import axios from 'axios'

const Blog = () => {
    // const [title, setTitle] = useState("");
    // const [description, setDescription] = useState("");
    // const [author, setAuthor] = useState("");
    // const [category, setCategory] = useState("");

    const [data, setData] = useState({
        title : "",
        description: "",
        author: "",
        category: ""
    })

    function handleChange(e){
        const name = e.target.name
        const value = e.target.value
        setData({
            ...data,
            [name] : value
        })
    }

    async function handleSubmit(e){
        e.preventDefault()
        console.log(data)
        const res = await axios.post("http://localhost:3002/question1/blogs", data)
        console.log(res)
        if(res.status == 200){
            alert("blog inserted")
            getCategories()
            setData({
                title : "",
                description: "",
                author: "",
                category: ""
            })
        }else{
            alert("blog not inserted")
        }
    }
    const [categories, setCategories] = useState([]);

    async function getCategories(){
        const res = await axios.get("http://localhost:3002/question1/categorys")
        const blogs = await axios.get("http://localhost:3002/question1/blogs")
        setCategories(res.data.data)
        setBlogs(blogs.data.data)
    }

    useEffect(()=>{
        getCategories()
    }, [])

    const [blogs, setBlogs] = useState([])

    async function handleDelete(id){
        const res = await axios.delete(`http://localhost:3002/question1/blogs/${id}`)
        console.log(res)
        if(res.status == 200){
            alert("blog deleted")
            getCategories()
        }
    }

  return (
    <>
        <h2>Blog</h2>
        <br />
        <hr />
        <br />

        <form onSubmit={handleSubmit} method='post'>
            <table>
                <tr>
                    <td>Blog Title : </td>
                    <td><input type="text" placeholder='enter title' name="title" value={data.title} onChange={handleChange} /></td>
                </tr>  
                 <tr>
                    <td>Blog Description : </td>
                    <td><textarea name="description" id="description" placeholder='enter title' value={data.description} onChange={handleChange} ></textarea></td>
                </tr>  
                <tr>
                    <td>Blog Author : </td>
                    <td><input type="text" placeholder='enter author' name="author" value={data.author} onChange={handleChange} /></td>
                </tr>  
                <tr>
                    <td>Category : </td>
                    <td>
                        <select name="category" id="category" value={data.category} onChange={handleChange} >
                            {
                                categories.map((cate, index)=>(
                                    <option key={cate._id} value={cate._id} >{ cate.name }</option>
                                ))
                            }
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Insert Blog" /></td>
                </tr>
            
            </table>
        </form>    


        <br />
        <hr />
        <br />

        <h2>Display Blog</h2>

        <br />
        <br />
        <br />

        <div>
            {
                <div>
                {
                blogs.map((blog) => (
                  <div key={blog._id}>
                    <h2>{blog.title}</h2>
                    <p>{blog.description}</p>
                    <p>Author: {blog.author}</p>
                    <p>Category: {blog.category.name}</p>
                    <button onClick={() => handleDelete(blog._id)}>Delete</button>
                  </div>
                ))
                }
              </div>
            }
        </div>
    </>
  )
}

export default Blog
