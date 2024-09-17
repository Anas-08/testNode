import axios from 'axios'
import React, { useEffect, useState } from 'react'
import { NavLink, Route, Routes } from 'react-router-dom'

const Home = () => {
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
        const res = await axios.post("http://localhost:3001/createUser",formData)
        console.log(res)
        
        setFormData({
            name:"",
            email:"",
            password:""
        })
        getAllUsers()
    }

    // get user data
    const [userData, setuserData] = useState([])
    const  getAllUsers = async ()=>{
        const res = await axios.get("http://localhost:3001/getAllUsers")
        console.log(res)
        // console.log(res.data.data)
        // setuserData(res.data.data)
        console.log(res.data)
        setuserData(res.data)        
    }

    useEffect(()=>{
        getAllUsers()
    },[])
    
    // delete 
    async function handleDelete(id){
        const res = await axios.delete(`http://localhost:3001/deleteUser/${id}`)
        if(res.status === 200 ){
            alert("Record Deleted")
            getAllUsers()
        }
    }

  return (
    <>
    <h1>Home</h1>
    <h3>Insert Data</h3>
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
                <td> <button type='submit'>Save</button></td>
            </tr>
        </table>
    </form>
    </center>

    <br />
    <hr />
    <br />
    <h3>Display Data</h3>
    <table border='1' cellSpacing='0' cellPadding='14'>
        <tr>
            <th>Sn</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th colSpan="2">Actions</th>
        </tr>
            {
                userData.map((item,index)=>(                
                     <tr key={index} >
                         <td>{index + 1}</td>
                         <td>{item.name}</td>
                        <td>{item.email}</td>
                        <td>{item.password}</td>
                        <td><button><NavLink to={`/updateUser/${item._id}`} >Edit</NavLink></button></td>
                        <td><button onClick={()=>handleDelete(item._id)}>Delete</button></td>
                    </tr>
                ))
            }
           
           

    </table>
    </>
  )
}

export default Home
