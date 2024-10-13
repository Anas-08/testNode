import React from 'react'
import { Link } from 'react-router-dom'

const Navbar = () => {
  return (
    <>
        <div>
            <Link to="/" >Home</Link> 
            <Link to="insert" >Insert</Link>
            <Link to="display" >Display</Link>    
        </div>
    </>
  )
}

export default Navbar
