import React from 'react'
import { Link } from 'react-router-dom'

const Navbar = ({cart}) => {
    console.log(cart)
  return (
    <>
      <div style={{border : "1px solid black", display : "flex", gap:"12px", padding : "12px"}} >
        <Link to='/' >Home</Link>
        <Link to='product' > Product </Link>
        <Link to='cart' > Cart </Link> <span>{cart.length}</span> 
      </div>
    </>
  )
}

export default Navbar
