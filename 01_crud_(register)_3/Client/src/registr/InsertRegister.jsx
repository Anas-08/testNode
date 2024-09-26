import React, { useState } from 'react'

const InsertRegister = () => {
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
       let name = e.target.name
       let value = e.target.value
    //     setFormData({
    //         ...formData,
    //         [name] : value 
    //     })
    console.log(e)
    }

    function handleSubmit(e){
        e.preventDefault()
        console.log(formData)
        setFormData({
            name:"",
            email:"",
            password:"",
            mobile:"",
            address:"",
            gender:"",
            course:""
        })
    }
  return (
   <>
    <center>    
        <h2>Form Insert</h2>
        <form onSubmit={handleSubmit}>
            <table>
                <tr>
                    <td>Name : </td>
                    <td> <input type="text" placeholder='enter name' name='name' value={formData.name} onChange={()=>handleChange()} required /> </td>
                </tr> 
                <tr>
                    <td>Email : </td>
                    <td> <input type="email" placeholder='enter email' name='email' value={formData.email} onChange={handleChange} required /> </td>
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
                    <td> <textarea name="address" cols='21' rows='3' id="address" value={formData.address} onChange={handleChange} ></textarea> </td>
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
    </center>
   </>
  )
}

export default InsertRegister
