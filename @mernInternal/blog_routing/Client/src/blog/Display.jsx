import React, { useEffect, useState } from 'react'
import axios from 'axios'
import {Link} from 'react-router-dom'


const Display = () => {

  const [blogData, setBlogData] = useState([])
  async function getAllData(){
    try{
      const res = await axios.get("http://localhost:3001/blogs")
      console.log(res.data.value)
      setBlogData(res.data.value)
    }catch(err){
      console.log(err) 
    }
  }

  useEffect(()=>{
    getAllData()
  },[])

  async function handleDelete(id){
    try{
      const res = await axios.delete(`http://localhost:3001/blogs/${id}`)
      if(res.status === 200){
        alert("Deleted")
        getAllData()
      }
    }catch(err){
      console.log(err) 
    }
  }

  return (
    <>
     <h1> Display</h1> 
    {
      blogData.map((item, index)=>(
        <div key={index} style={{border:'1px solid black', padding:'12px', margin:'4px', width:'350px'}} >
          <h2>{item.name}</h2>
          <h2>{item.desc}</h2>
          <h2>{item.type}</h2>
          <div>
            <button> <Link to={`update/${item._id}`}>Edit </Link> </button>
            <button onClick={()=>handleDelete(item._id)} >Delete</button>
          </div>
        </div>
      ))
    }
    </>
  )
}

export default Display
