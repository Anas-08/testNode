import React from 'react'
import { Link } from 'react-router-dom'

const Navbar = () => {
  return (
    <>
        {/* <h2>Navbar</h2>  */}
        <div>
            <Link to='/' >Home</Link>
            <Link to='/blogs' >Blog</Link>
        </div>
    </>
  )
}

export default Navbar
