import axios from 'axios'
import React, { useEffect, useState } from 'react'
import { useParams } from 'react-router-dom'

const Update = () => {
  
  const {id} = useParams()
  const [blog, setBlog] = useState({
    name : "",
    desc : "",
    type : ""
  })


  async function getSingleData(){
    try{
      const res = await axios.get(`http://localhost:3001/blogs/${id}`)
      console.log(res.data.value)
      setBlog(res.data.value)
    }catch(err){
      console.log(err) 
    }
  }

  useEffect(()=>{
    getSingleData()
  },[])

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
    const res = await axios.put(`http://localhost:3001/blogs/${id}`, blog)
    console.log(res)
    if(res.status === 200){
      alert("updated")
      setBlog({
        name : "",
        desc : "",
        type : ""
      })
    }
  }
  
  return (
    <>
        <h1>Update Blog</h1> 

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
                <select name="type" id="type" value={blog.desc} onChange={handleChange}>
                  <option value="javaScript">Javascript</option>
                  <option value="java">Java</option>
                  <option value="C++">C++</option>
                  <option value="python">Python</option>
                </select>
              </td>
            </tr>
            <tr>
              <td></td>
              <td><input type="submit" value="UPdate Blog" /></td>
            </tr>
          </table>
        </form>

    </>
  )
}

export default Update
