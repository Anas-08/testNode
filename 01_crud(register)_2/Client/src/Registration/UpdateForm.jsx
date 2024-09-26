import axios from 'axios'
import React, { useEffect, useState } from 'react'
import { useNavigate, useParams } from 'react-router-dom'

const UpdateForm = () => {
  const {id} = useParams()
  const navigate = useNavigate()

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

    const res = await axios.put(`http://localhost:3001/updateUser/${id}`,formData)
    console.log(res)
    navigate('/')

  }

  //get user data from backend(means the db)
 // const [userData, setUserData] = useState([]) // to store the data

  async function getAllUsers(){
    const res = await axios.get(`http://localhost:3001/singleUser/${id}`)
    console.log(res)
    console.log(res.data)
    setFormData({
      name : res.data.name,
      email : res.data.email,
      mobile : res.data.mobile,
      password : res.data.password,
      gender : res.data.gender,
      course : res.data.course
    })
  }

  useEffect(()=>{
    getAllUsers()
  },[])

  return (
    <>
       
    <center>
   <h2>Update Data</h2>
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
          <td><input type="submit" value="Update" /></td>
        </tr>
      </table>
    </form>
    </center>

    </>
  )
}

export default UpdateForm
