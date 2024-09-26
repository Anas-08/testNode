import axios from 'axios'
import React, { useEffect, useState } from 'react'
import { NavLink } from 'react-router-dom'

const FormReg = () => {
    const [formData, setFormData] = useState({
        name:"",
        email:"",
        mobile:"",
        password:"",
        gender:"",
        // dob:"",
        course:"",
      })
      function handleChange(e){
        let name = e.target.name
        let value = e.target.value
        setFormData({
          ...formData,
          [name] : value
        })
      }

      // send(post)  data to backend 
    async function handleSubmit(e){
        e.preventDefault()
        console.log(formData)

        const res = await axios.post("http://localhost:3001/createUser",formData)
        console.log(res)
        alert("Record Inserted")
        setFormData({
          name:"",
        email:"",
        mobile:"",
        password:"",
        gender:"",
        // dob:"",
        course:"",
        })

        getAllUsers()
      }

      //get user data from backend(means the db)
      const [userData, setUserData] = useState([]) // to store the data

      async function getAllUsers(){
        const res = await axios.get("http://localhost:3001/allUsers")
        console.log(res)
        console.log(res.data)
        setUserData(res.data)
      }

      useEffect(()=>{
        getAllUsers()
      },[])

      // delete
      async function handleDelete(id){
        const res = await axios.delete(`http://localhost:3001/deleteUser/${id}`)
        if(res.status === 200){
            alert("Record Deleted")
            getAllUsers()
        }
      }
  return (
    <>
    <center>
   <h2>Insert Form</h2>
    <form onSubmit={handleSubmit} >
      <table>
        <tr>
          <td>Name : </td>
          <td><input type="text" placeholder='enter name' name='name' value={formData.name} onChange={handleChange} required /> </td>
        </tr>
        <tr>
          <td>Email : </td>
          <td><input type="email" placeholder='enter email' name='email' value={formData.email} onChange={handleChange} required /> </td>
        </tr>  
        <tr>
          <td>Mobile : </td>
          <td><input type="text" placeholder='enter mobile' name='mobile' value={formData.mobile} onChange={handleChange} required /> </td>
        </tr> 
        <tr>
          <td>Password : </td>
          <td><input type="password" placeholder='enter password' name='password' value={formData.password} onChange={handleChange} required /> </td>
        </tr>         
        <tr>
         
          <td> Gender : </td>
          <td><input type="radio" value="male" name='gender' onChange={handleChange}  />male  <input type="radio" value="female" name='gender' onChange={handleChange} />female </td>
        </tr>     
        {/* <tr>
          <td>Dob : </td>
          <td><input type="date" name='date' value={formData.dob} onChange={handleChange}  /> </td>
        </tr>  */}
        <tr>
          <td>Select Course : </td>
          <td> <select name="course" id="" value={formData.course} onChange={handleChange} >
            <option value="mca">mca</option>
            <option value="bca">bca</option>
            <option value="msc">msc</option>
            </select> </td>
        </tr>
        {/* <tr>
          <td>Hobbies : </td>
          <td>
            <input type="checkbox" value="swimming" name="h1" id="" /> swimming 
            <input type="checkbox" value="reading" name="h2" id="" /> reading
            <input type="checkbox" value="singing" name="h2" id="" /> singing
          </td>
        </tr> */}

        <tr>
          <td><input type="reset" value="Reset" /></td>
          <td><input type="submit" value="Register" /></td>
        </tr>
      </table>
    </form>
    </center>

    <br />
    <hr />
    <br />

    <h2>Display Data</h2>
    <br />
    <br />

    <table border='1' cellPadding='14' cellSpacing='0' >
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Password</th>
            <th>Gender</th>
            <th>Course</th>
            <th colSpan='2'>Actions</th>
        </tr>
            {
                userData.length === 0 ? ( <td colSpan='7'>No Data Inserted yet !</td> ) : (
                    userData.map((item,index)=>(
                        <tr key={index} >
                            <td>{item.name}</td>
                            <td>{item.email}</td>
                            <td>{item.mobile}</td>
                            <td>{item.password}</td>
                            <td>{item.gender}</td>
                            <td>{item.course}</td>
                            <td><button><NavLink to={`/updateUser/${item._id}`} >Edit</NavLink></button></td>
                            <td><button onClick={()=>handleDelete(item._id)} >Delete</button></td>
                        </tr>        
                    ))
                ) 
            }
    </table>
   </>
  )
}

export default FormReg
