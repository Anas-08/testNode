import axios from 'axios'
import React, { useState } from 'react'

const Insert = () => {

  const [blog, setBlog] = useState({
    name : "",
    desc : "",
    type : ""

  })
  function handleChange(e){
    const name = e.target.name
    const value = e.target.value
    setBlog({
      ...blog, 
      [name] : value
    })
  }

  async function handleSubmit(e){
    e.preventDefault()
    console.log(blog)
    const res = await axios.post("http://localhost:3001/blogs", blog)
    console.log(res)
    if(res.status === 200){
      alert("inserted")
      setBlog({
        name : "",
        desc : "",
        type : ""
      })
    }
  }
  
  return (
    <>
        <h1>Insert Blog</h1> 

        <form action="" onSubmit={handleSubmit}>
          <table>
            <tr>
              <td>Blog Title : </td>  
              <td><input type="text" name='name' value={blog.name} placeholder='enter title' onChange={handleChange} required /></td>  
            </tr> 
            <tr>
              <td>Blog Description : </td>  
              <td><textarea name='desc' value={blog.desc} placeholder='enter description' onChange={handleChange} required ></textarea></td>  
            </tr>  
            <tr>
              <td>
                <select name="type" id="type" value={blog.type} onChange={handleChange}>
                  <option value="javaScript">Javascript</option>
                  <option value="java">Java</option>
                  <option value="C++">C++</option>
                  <option value="python">Python</option>
                </select>
              </td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" value="Add Blog" /></td>
            </tr>
          </table>
        </form>

    </>
  )
}

export default Insert
 