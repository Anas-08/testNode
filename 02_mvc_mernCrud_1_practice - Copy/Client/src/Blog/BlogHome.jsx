import React from 'react'
import { Link, Outlet } from 'react-router-dom'

const BlogHome = () => {
  return (
    <>
     <center>
     Blog Home 
       <div>
       <Link to='blog'>Insert</Link>    

<Outlet/>

       </div>
    </center> 
    </>
  )
}

export default BlogHome
   