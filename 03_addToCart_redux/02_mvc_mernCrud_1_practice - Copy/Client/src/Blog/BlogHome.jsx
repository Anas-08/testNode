import React from 'react'
import { Link, Outlet } from 'react-router-dom'

const BlogHome = () => {
  return (
    <>
     <center>
     Blog Home 
       <div>
       <Link to='blog'>Blog useState</Link>    
       <Link to='blog/redux'>Blog Redux</Link>    
        
        <Outlet/>

       </div>
    </center> 
    </>
  )
}

export default BlogHome
   