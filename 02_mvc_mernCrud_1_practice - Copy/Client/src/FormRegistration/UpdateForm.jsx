import React, { useState } from 'react'
import { useParams } from 'react-router-dom'

const UpdateForm = () => {
  const {id} =  useParams()
  console.log(id)
    const [formData, setFormData] = useState({
        name : "",
        email : "",
        password : "",
        mobile : "",
        address : "",
        gender : "",
        course : ""
      })
    
      function handleChange(e){
          let name = e.target.name
          let value = e.target.value
          setFormData({
            ...formData,
            [name] : value
          })
      }
    
      function handleSubmit(e){
        e.preventDefault()
        console.log(formData)
        setFormData({
          name : "",
          email : "",
          password : "",
          mobile : "",
          address : "",
          gender : "",
          course : ""
        })
      }

  return (
    <>
      <center>
        <h2>Update Data</h2>
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
                <td><input type="submit" value='Update' /></td>
              </tr>
            </table>
          </form>
      </center> 
    </>
  )
}

export default UpdateForm
