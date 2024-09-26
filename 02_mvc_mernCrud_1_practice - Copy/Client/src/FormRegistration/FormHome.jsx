import React from 'react'
import { Link, Outlet } from 'react-router-dom'

const FormHome = () => {
  return (
    <>
     Form Home 
     <div>
        <Link to='user'>Insert</Link>
        <Link to=':id'>Update</Link>
     </div>

     <Outlet/>
    </>
  )
}

export default FormHome
