import axios from 'axios'
import React, { useEffect, useState } from 'react'

const BlogInsert = () => {

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

    async function handleSubmit(e){
        e.preventDefault()
        console.log(blog)
        // await insert()
        const res = await axios.post("http://localhost:3001/question2/blog/", blog)
            console.log(res)
            console.log(res.data.value)
            if(res.status === 200){
                alert("Blog Inserted")
                getBlog()
                setBlog({
                    name : "",
                    description : "",
                    type : ""
                })
            }
        
    }

    const [blogData, setBlogData] = useState([])
    // get blog
   async function getBlog(){
        try{
           const res = await axios.get("http://localhost:3001/question2/blog/")
            console.log(res.data.value)
            setBlogData(res.data.value)
           
        }catch(err){
            console.log(err)
        }
    }

    useEffect(()=>{
        getBlog()
    },[])


//   async function insert(){
//         try{
//             const res = await axios.post("http://localhost:3001/question2/blog/", blog)
//             console.log(res)
//             console.log(res.data.value)
//             if(res.status === 200){
//                 alert("Blog Inserted")
//             }
//         }catch(err){
//             console.log(err) 
//         }
//     }

// filter 
const [query, setQuery] = useState('')

// handleDelete
async function handleDelete(id){
    try{
        const res = await axios.delete(`http://localhost:3001/question2/blog/${id}`)
        if(res.status === 200){
            alert("Blog Deleted")
            getBlog()
        }
    }catch(e){
        console.log(e)
    }
}

  return (
    <>
        <center>
            <h2>Insert Blog using usestate</h2> 

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
            {
                blogData.length === 0 ? (<h2 style={{textAlign:'center'}}>No Blog Posted yet !</h2>) : 
                ( 
                    blogData.filter((data)=> data.type.includes(query)
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

export default BlogInsert
