import React, { useState } from 'react'
import axios from 'axios'

const Registration = () => {

    const [data, setData] = useState({
      name : "",
      email : "",
      password : "",
      cpassword : ""
    })

    function handleChange(e){
      const {name, value } = e.target
    
     setData({...data,[name]:value})
    }

    function register(){
      const { name, email, password, cpassword } = data

      if(name && email && password && ( password === cpassword ) ){
        // alert("Posted")
        //http://localhost:3001/register/
        axios.post("http://localhost:3001/register",data)
        .then( res => console.log(res) )
      }else{
        alert("Invalid")
      }

    }

  return (
    <>

        <center>
        <h1>Registration Page</h1> 
   
<table>
  {console.log(data)}
  <tr>
    <td>Name : </td>
    <td><input type='text' value={data.name} placeholder='name' name='name' onChange={handleChange} required /></td>
  </tr>  
  <tr>
    <td>Email : </td>
    <td><input type='email' value={data.email} placeholder='email' name='email' onChange={handleChange} required /></td>
  </tr>
  <tr>
    <td>Password : </td>
    <td><input type='password' value={data.password} placeholder='password' name='password' onChange={handleChange} required /></td>
  </tr> 
  <tr>
    <td>Confirm Password : </td>
    <td><input type='password' value={data.cpassword} placeholder='confirm password' name='cpassword' onChange={handleChange} required /></td>
  </tr>
  <tr>
    <td> </td>
    <td><button onClick={register} >Register</button></td>
  </tr>
  <tr>
    <td></td>
    <td>Already Register <a href="../login/Login.jsx">Login Here </a></td>
  </tr>
</table>

       </center>

    </>
  )
}

export default Registration
