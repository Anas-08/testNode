import axios from 'axios'
import React, { useEffect, useState } from 'react'
import { NavLink } from 'react-router-dom'

const Insert = () => {
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

    // send data to the server side
   async function handleSubmit(e){
        e.preventDefault()

        // console.log(formData)
        const res = await axios.post("http://localhost:3001/createUser",formData)
        console.log(res)
        if(res.status === 200){
            alert("record inserted")
            
        }
        setFormData({
            name:"",
            email:"",
            password:"",
            mobile:"",
            address:"",
            gender:"",
            course:""
        })
        getAllUsers()
    }

    // get the data fom the server
    const [data, setData] = useState([])
    async function getAllUsers(){
        const res = await axios.get("http://localhost:3001/getAllUsers")
        // console.log(res)
        console.log(res.data)
        setData(res.data)
    }

    useEffect(()=>{
        getAllUsers()
    },[])

    // delete user
    async function handleDelete(itemId){
        const id = itemId
        const res = await axios.delete(`http://localhost:3001/deleteUser/${id}`)
        if(res.status === 200){
            alert("Record Deleted")
            getAllUsers()
        }
    }

  return (
    <>
    <center>
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
                    <td> <select name="course" id="course" onChange={handleChange} >
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

        <br />
        <hr />
        <br />

        <h2>Display Data</h2>
        <br />

        <table border='1' cellPadding='14' cellSpacing='0'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Course</th>
                <th colSpan='2'>Actions</th>
            </tr>

            {
                data.length === 0 ? ( <td colSpan='7'>No Data inserted yet ! </td>  )  : (
                    data.map((item, index)=>(
                        <tr key={index}>
                            <td>{item.name}</td>
                            <td>{item.email}</td>
                            <td>{item.password}</td>
                            <td>{item.mobile}</td>
                            <td>{item.address}</td>
                            <td>{item.gender}</td>
                            <td>{item.course}</td>
                            <td><button><NavLink to={`/updateUser/${item._id}`} >Edit</NavLink></button></td>
                            <td><button onClick={()=> handleDelete(item._id)}>Delete</button></td>
                        </tr>
                    ))
                ) 

                // data.map((item, index)=>(
                //     <tr key={index}>
                //         <td>{item.name}</td>
                //         <td>{item.email}</td>
                //         <td>{item.password}</td>
                //         <td>{item.mobile}</td>
                //         <td>{item.address}</td>
                //         <td>{item.gender}</td>
                //         <td>{item.course}</td>
                //         <td>Edit</td>
                //         <td>Delete</td>
                //     </tr>
                // ))
            }
            
        </table>
    </center>
      
    </>
  )
}

export default Insert
