import React, { useEffect, useState } from 'react'
import axios from 'axios'
import { Link, NavLink, Outlet, useNavigate } from 'react-router-dom'

const InsertForm = () => {
  const navigate = useNavigate();
  
  const [formData, setFormData] = useState({
    name : "",
    email : "",
    password : "",
    mobile : "",
    address : "",
    gender : "",
    course : ""
  })

  const [id, setId] = useState(null)


  function handleChange(e){
      let name = e.target.name
      let value = e.target.value
      setFormData({
        ...formData,
        [name] : value
      })
  }

  // insert data(while submit the form)
 async function insert(){
    try{
      const res = await axios.post("http://localhost:3001/question1/user",formData)
      if(res.status === 200){
        alert('Record Inserted')
      }
    }catch(error){
      console.log(error)
    }
 }

 async function handleSubmit(e){
    e.preventDefault()
   
      if(!id){
          await insert()
      }else{
        await update()
        setId(null)
      }
      setFormData({
        name : "",
        email : "",
        password : "",
        mobile : "",
        address : "",
        gender : "",
        course : ""
      })
      getUserData()

  }
  

  // get data
  const [userData, setUserData] = useState([])
  async function getUserData(){
    const res = await axios.get("http://localhost:3001/question1/user")
    console.log(res.data.value)
    setUserData(res.data.value)
  }

  useEffect(()=>{
    getUserData()
  },[])

  // for delete
 async function handleDelete(id){
    const res = await axios.delete(`http://localhost:3001/question1/user/${id}`)
    if(res.status === 200){
      alert('Record Deleted')
      getUserData()
    }
  }

  // for update
 async function update(){
    try{
      const res = await axios.put(`http://localhost:3001/question1/user/${id}`,formData)
      if(res.status === 200){
        alert('Record Updated')
        getUserData()
      }
    }catch(error){
      console.log(error)
    }
  }

  function handleEdit(singleUserDetail){
    setFormData({
      name : singleUserDetail.name,
      email : singleUserDetail.email,
      password : singleUserDetail.password,
      mobile : singleUserDetail.mobile,
      address : singleUserDetail.address,
      gender : singleUserDetail.gender,
      course : singleUserDetail.course
    })
    setId(singleUserDetail._id)
  }

  // search 
  const [query, setQuery] = useState('')
  function search(){
    const filteredData = userData.filter((data) => data.name.toLowerCase().includes('test414'))
    console.log(filteredData)
  }
  // search()

  return (
    <>
      <center>
        <h2>Insert Data</h2>
          <form onSubmit={handleSubmit}>
            <table>
              <tr>
                <td>Name : </td>
                <td><input type="text" placeholder='enter name' name='name' value={formData.name} onChange={handleChange}  /></td>
              </tr>
              <tr>
                <td>Email : </td>
                <td><input type="email" placeholder='enter email' name='email' value={formData.email} onChange={handleChange} /></td>
              </tr> 
              <tr>
                <td>Password : </td>
                <td><input type="password" placeholder='enter password' name='password' value={formData.password} onChange={handleChange} /></td>
              </tr>
              <tr>
                <td>Mobile : </td>
                <td><input type="text" placeholder='enter mobile' name='mobile' value={formData.mobile} onChange={handleChange} /></td>
              </tr>
              <tr>
                <td>Address : </td>
                <td> <textarea name="address" placeholder='enter address' cols='20' rows='2' id="address" value={formData.address} onChange={handleChange} ></textarea></td>
              </tr>
              <tr>
                <td>Gender : </td>
                <td> <input type="radio" name='gender' value='male' onChange={handleChange} />Male <br /> <input type="radio" name='gender' value='female' onChange={handleChange} />Female</td>
              </tr>
              <tr>
                <td>Select Course : </td>
                <td><select name="course" id="course" value={formData.course} onChange={handleChange} >
                  <option value="mca">MCA</option>
                  <option value="bca">BCA</option>
                  <option value="msc">MSc</option>
                  </select></td>
              </tr>
              <tr>
                <td></td>
                <td><input type="submit" value={!id ? "Insert" : "Update"} /></td>
              </tr>
            </table>
          </form>

          <br />
          <hr />
          <br />

          <h2>Display Data</h2>
        <div>
          <table>
            <tr>
              <td>Search : </td>
              <td><input type="text" placeholder='search name' onChange={(e)=> setQuery(e.target.value)} /></td>
            </tr>

          </table>
        </div>
          <table border='1px solid black' cellPadding='14' cellSpacing='0'>
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
              userData.length === 0 ? (<td colSpan='7'>No Record Inserted yet !</td>) : (
                userData.filter((data) => data.name.toLowerCase().includes(query)).map((item, index)=>(
                  <tr key={index}>

                   <td>{item.name}</td> 
                   <td>{item.email}</td> 
                   <td>{item.password}</td> 
                   <td>{item.mobile}</td> 
                   <td>{item.address}</td> 
                   <td>{item.gender}</td> 
                   <td>{item.course}</td> 
                   {/* <td> <Link to={`${item._id}`} >Edit</Link> </td>  */}
                   {/* <td> <Redirect to={`${item._id}`} >Edit</Redirect> </td>  */}
                   <td> <button onClick={ ()=> handleEdit(item) } > Edit </button> </td> 
                   <td><button onClick={()=>handleDelete(item._id)}>Delete</button></td> 
                  </tr>
                ))
              )
            }
          </table>
      </center>      
    </>
  )
}

export default InsertForm
