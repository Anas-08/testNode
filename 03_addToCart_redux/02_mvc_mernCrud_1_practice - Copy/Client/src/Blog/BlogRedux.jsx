import axios from 'axios'
import React, { useEffect, useState } from 'react'

import { useDispatch, useSelector } from 'react-redux'
import { fetchBlogs, addBlog, removeBlog } from '../Redux/BlogSlice'

const BlogRedux = () => {

    const [blog, setBlog] = useState({
        name : "",
        description : "",
        type : ""
    })

    function handleChange(e){
        let value = e.target.value
        let name = e.target.name
        setBlog({
            ...blog,
            [name] : value
        })
    }

    const dispatch = useDispatch()
    const { blogRedux, status } = useSelector((state) => state.blog)

    useEffect(()=>{
        dispatch(fetchBlogs())
    },[dispatch])

    function handleSubmit(e){
        e.preventDefault()
        console.log(blog)
        // await insert()
        dispatch(addBlog(blog))

            setBlog({
                name : "",
                description : "",
                type : ""
            })   
    }

    function handleDelete(id){
        dispatch(removeBlog(id))
    }

  



   
// filter 
const [query, setQuery] = useState('')

  return (
    <>
        <center>
            <h2>Insert Blog using Redux</h2> 

            <form onSubmit={handleSubmit}>
                <table>
                    <tr>
                        <td>Blog Name : </td>  
                        <td><input type="text" name='name' placeholder='enter name' value={blog.name} onChange={handleChange} /></td>
                    </tr>   
                    <tr>
                        <td>Blog Description : </td>  
                        <td> <textarea name="description" id="description" placeholder='enter description' value={blog.description} onChange={handleChange} ></textarea> </td>
                    </tr>  
                    <tr>
                        <td>Select Language : </td>
                        <td><select name="type" id="type" value={blog.type} onChange={handleChange} >
                            {/* <option value="none" selected disabled >select</option>     */}
                            <option value="javascript" >Javascript</option>    
                            <option value="Java">Java</option>    
                            <option value="c++">C++</option>    
                            <option value="c">C</option>    
                        </select></td>  
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="submit" value='Insert' /></td>
                    </tr>
                </table>
            </form>  

            <br />  
            <hr />  
            <br />  

        <h2>Display Blog</h2>
        <br />
            <form >
                <table>
                <tr>
                        <td>Filter Language : </td>
                        <td><select name="type" id="type" onChange={(e)=>setQuery(e.target.value)} >
                            <option value="" selected >All</option>    
                            <option value="javascript" >Javascript</option>    
                            <option value="Java">Java</option>    
                            <option value="c++">C++</option>    
                            <option value="c">C</option>    
                        </select></td>  
                    </tr>
                </table>
            </form>
        <br />
        <div style={{border: '1px solid black'}}>
           {/* {
            blogData.map((item, index)=>(
                <div style={{border: '1px solid black',margin:'12px'}} key={index} >
                    <h5>Name : {item.name}</h5>
                    <h5>Description : {item.description}</h5>
                    <h5>Type : {item.type}</h5>
                </div>
            ))
           } */}

           <h2>Number of Blog Posted is : { blogRedux.length }</h2>
            {
                blogRedux.length === 0 ? (<h2 style={{textAlign:'center'}}>No Blog Posted yet !</h2>) : 
                ( 
                    blogRedux.filter((data)=> data.type.includes(query)
                    ).map((item, index)=>(
                        <div style={{border: '1px solid black',margin:'12px', padding:'12px'}} key={index} >
                        <h5>Name : {item.name}</h5>
                        <h5>Description : {item.description}</h5>
                        <h5>Type : {item.type}</h5>
                        <button onClick={()=>handleDelete(item._id)}>Delete</button>
                    </div>
                    ))
                )
            }
        </div>
        </center> 
    </>
  )
}

export default BlogRedux
