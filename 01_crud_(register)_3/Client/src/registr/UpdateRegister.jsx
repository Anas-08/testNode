import axios from 'axios'
import React, { useEffect, useState } from 'react'
import { Navigate, useNavigate, useParams } from 'react-router-dom'

const UpdateRegister = () => {
const {id} = useParams()
const navigate = useNavigate()

  const [formData, setFormData] = useState({
    name:"",
    email:"",
    password:"",
    mobile:"",
    address:"",
    gender:"",
    course:""
})

function handleChange(e){
    // console.log(e)
    let name = e.target.name
    let value = e.target.value
    // console.log(name, value)

    setFormData({
        ...formData,
        [name] : value
    })
}

// send data to the server side (update)
async function handleSubmit(e){
    e.preventDefault()

    // console.log(formData)
    const res = await axios.put(`http://localhost:3001/updateUser/${id}`,formData)
    console.log(res)
    if(res.status === 200){
        alert("record updated")
        navigate('/')
        
    }

}

// get the data fom the server

async function getSingleUsers(){
    const res = await axios.get(`http://localhost:3001/getSingleUser/${id}`)
    // console.log(res)
    console.log(res.data)
    setFormData({
      name : res.data.name,
      email : res.data.email,
      password : res.data.password,
      mobile : res.data.mobile,
      address : res.data.address,
      gender : res.data.gender,
      course : res.data.course
    })
}

useEffect(()=>{
  getSingleUsers()
},[])

  return (
    <>
      <form onSubmit={handleSubmit} >
            <table>
                <tr>
                    <td>Name : </td>
                    <td><input type="text" placeholder='enter name' name='name' value={formData.name} onChange={handleChange} required /></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type="email" placeholder='enter email' name='email' value={formData.email} onChange={handleChange} required /></td>
                </tr>
                <tr>      
                    <td>Password : </td>
                    <td> <input type="password" placeholder='enter password' name='password' value={formData.password} onChange={handleChange} required /> </td>
                </tr> 
                <tr>
                    <td>Mobile : </td>
                    <td> <input type="mobile" placeholder='enter mobile' name='mobile' value={formData.mobile} onChange={handleChange} required /> </td>
                </tr> 
                <tr>
                    <td>Address : </td>
                    <td> <textarea name="address" cols='21' rows='3' id="address" value={formData.address}  onChange={handleChange} ></textarea> </td>
                </tr>  
                <tr>
                    <td>Gender : </td>
                    <td> <input type="radio" value='male' name='gender' onChange={handleChange}  /> Male <br/> <input type="radio" value='female' name='gender' onChange={handleChange}  /> Female  </td>
                </tr>
                <tr>
                    <td>Course: </td>
                    <td> <select name="course" id="course" value={formData.course} onChange={handleChange} >
                        <option value="mca">MCA</option>
                        <option value="bca">BCA</option>
                        <option value="pgdca">PGDCA</option>
                        <option value="msc">MSC</option>
                        </select> </td>
                </tr>   
                <tr>
                    <td></td>
                    <td><input type="submit" value='Save' /></td>
                </tr>
            </table>
        </form>

    </>
  )
}

export default UpdateRegister
