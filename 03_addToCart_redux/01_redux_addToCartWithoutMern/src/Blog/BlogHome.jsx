import React from 'react'
import { Link, Outlet } from 'react-router-dom'

const BlogHome = () => {
  return (
    <>
        <div  style={{textAlign:'center'}}>
            <h2>Blog Home</h2>

      <div style={{display:'flex', gap:'12px'}}>
      <Link to='blog/usestate'>useState Blog</Link>
      <Link to='blog/redux'>Redux Blog</Link>
      </div>

        <Outlet/>
        </div> 
    </>
  )
}

export default BlogHome
