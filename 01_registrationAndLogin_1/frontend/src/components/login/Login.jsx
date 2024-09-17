import React, { useState } from 'react'

const Login = () => {

  const [data, setData] = useState({
    email : "",
    password : "",
  })

  function handleChange(e){
    const {name, value } = e.target
  
   setData({...data,[name]:value})
  }

  return (
    <>
       <center>
       <h1>Login Page</h1> 

<table>
  <tr>
    {console.log(data)}
    <td>Name : </td>
    <td><input type='text' value={data.email} placeholder='email' name='email' onChange={handleChange} required /></td>
  </tr>
  <tr>
    <td>Password : </td>
    <td><input type='password' value={data.password} placeholder='password' name='password' onChange={handleChange} required /></td>
  </tr>
  <tr>
    <td> </td>
    <td><input type='submit'  name='submit' value='Login' /></td>
  </tr>
  <tr>
    <td></td>
    <td>Not Register yet ? <a href="../registration/Registration.jsx">Register Here </a></td>
  </tr>
</table>

       </center>


    </>
  )
}

export default Login
