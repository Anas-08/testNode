import axios from 'axios'
import React, { useState } from 'react'

const Registration = () => {

    const [formData, setFormData] = useState({
        name:"",
        email:"",
        password:"",
        cpassword:""
    })

    function handleChange(e){
        //console.log(e.target.value)
        let name = e.target.name //key
        let value = e.target.value //value
        setFormData({
            ...formData,
            [name] : value
        })
    }

   async function handleSubmit(e){
        e.preventDefault();
        console.log(formData)
        const {name, email, password, cpassword } = formData
        if(name && email && password && (password === cpassword) ){
           try{
          const res = await axios.post("http://localhost:3001/register/", formData)
            .then((res) => {
                console.log(res)
               // console.log(res.data)
            })
            .catch(err => console.log(err))

            alert("posted")
            setFormData({name:"",email:"",password:"", cpassword:""})
           }catch(err){
                console.log(err)
           }
        }else{
            
            alert("Not posted")
        }
    }

    // without async & await
    //  function handleSubmit(e){
    //     e.preventDefault();
    //     console.log(formData)
    //     const {name, email, password, cpassword } = formData
    //     if(name && email && password && (password === cpassword) ){
    //        try{
    //        axios.post("http://localhost:3001/register/", formData)
    //         .then((res) => {
    //             console.log(res)
    //            // console.log(res.data)
    //         })
    //         .catch(err => console.log(err))

    //         alert("posted")
    //         setFormData({name:"",email:"",password:"", cpassword:""})
    //        }catch(err){
    //             console.log(err)
    //        }
    //     }else{
            
    //         alert("Not posted")
    //     }
    // }

  return (
    <>
    <h1>Form</h1>

        <form action="" onSubmit={handleSubmit}>
            <table>
                <tr>
                    <td>Name : </td>
                    <td> <input type="text" placeholder='enter name' name='name' value={formData.name} onChange={handleChange} required /> </td>
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
                    <td>Confirm Password : </td>
                    <td> <input type="password" placeholder='re-enter password' name='cpassword' value={formData.cpassword} onChange={handleChange} required /> </td>
                </tr>
                <tr>
                    <td></td>
                    <td> <input type="submit" value="Save" /> </td>
                </tr>
           </table>    
        </form> 
    </>
  )
}

export default Registration
