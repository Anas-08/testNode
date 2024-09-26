import React from 'react'
import { Link } from 'react-router-dom'

const Navbar = () => {
  return (
    <>
        <div style={{padding:'12px', border:'1px solid black',display:'flex',gap:'12px',fontSize:'22px' }}>
            <Link to='/'>Home</Link>
            <Link to='/insertForm'>Reg Crud</Link>
        </div> 
        <br />
        <hr />
        <br />
    </>
  )
}

export default Navbar
