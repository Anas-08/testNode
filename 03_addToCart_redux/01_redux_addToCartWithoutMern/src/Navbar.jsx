import React from 'react'
import { useSelector } from 'react-redux'
import { Link } from 'react-router-dom'

const Navbar = () => {

    const item = useSelector((state)=> state.cart)
  return (
    <>
      <nav style={{border:'1px solid black', padding: '12px', display: 'flex', gap: '12px'}}> 
        <Link to='/' >Home</Link>
        <Link to='/blog' >Blog</Link>
        <Link to='/cart' >Cart</Link>
        <span>items : {item.length}</span>
      </nav>   
    </>
  )
}

export default Navbar
