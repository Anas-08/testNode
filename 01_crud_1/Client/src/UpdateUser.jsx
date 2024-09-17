import axios from 'axios'
import React, { useEffect, useState } from 'react'
import { useNavigate, useParams } from 'react-router-dom'

const UpdateUser = () => {
    const {id} = useParams()
    const navigate = useNavigate()

       // set user data
    const [formData, setFormData] = useState({
        name:"",
        email:"",
        password:""
    })

    function handleChange(e){
        let name = e.target.name
        let value = e.target.value
        setFormData({
            ...formData,
            [name] : value
        })
    }

   async function handleSubmit(e){
        e.preventDefault()
        console.log(formData)
        const res = await axios.put(`http://localhost:3001/updateUser/${id}`,formData)
        console.log(res)
        navigate('/')
        // setFormData({
        //     name:"",
        //     email:"",
        //     password:""
        // })
       // getAllUsers()
    }

     // get user data
     const [userData, setuserData] = useState([])
     const  getAllUsers = async ()=>{
         const res = await axios.get(`http://localhost:3001/getUser/${id}`)
         console.log(res)
         // console.log(res.data.data)
         // setuserData(res.data.data)
         console.log(res.data)
         //setuserData(res.data)  
         setFormData({
            name: res.data.data.name,
            email: res.data.data.email,
            password: res.data.data.password
         })      
         
     }
 
     useEffect(()=>{
         getAllUsers()
     },[])
  return (
    <>
       <h3>Update Data</h3>
    <center>
    <form onSubmit={handleSubmit}>
        <table>
            <tr>
                <td>Name : </td>
                <td> <input type="text" placeholder='enter name' name='name' value={formData.name} onChange={handleChange} required /></td>
            </tr>  
            <tr>
                <td>Email : </td>
                <td> <input type="email" placeholder='enter email' name='email' value={formData.email} onChange={handleChange} required /></td>
            </tr> 
            <tr>
                <td>Password : </td>
                <td> <input type="password" placeholder='enter password' name='password' value={formData.password} onChange={handleChange} required /></td>
            </tr> 
            <tr>
                <td> </td>
                <td> <button type='submit'>Update</button></td>
            </tr>
        </table>
    </form>
    </center>
    </>
  )
}

export default UpdateUser
