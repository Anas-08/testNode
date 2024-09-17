import { useEffect, useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import axios from 'axios'

function App() {
  const [data, setData] = useState({})

  const [fromServer, setFromServer] = useState([])

  function handleChange(e){
    console.log(e.target.value, e.target.name)

    setData({
      ...data,
      [e.target.name] : e.target.value
    })
  }

//   const handleSubmit = async(e)=>{
//     e.preventDefault();
//     console.log(data)
//     // here we can use axios and fetch

//   //  axios.post("http://localhost:3001/send",data)

//   const res = await fetch("http://localhost:3001/send",{
//     method:"POST",
//     body:JSON.stringify(data),
//     headers:{
//       'Content-Type':'application/json'
//     }

//   })
// //  const responseFromServer = await res.text() // it will give what response coming fron the server
//   const responseFromServer1 = await res.json() // it will give what response coming fron the server
//   console.log(res)
// //  console.log("in text format -> ",responseFromServer)
//   console.log("in json format -> ", responseFromServer1)
//   }


const handleSubmit = (e)=>{
  e.preventDefault();
  console.log(data)

  axios.post("http://localhost:3001/send",data)
  .then((res)=>{
    console.log(res)
    console.log(res.data)
  })
  .catch((err)=>{
    console.log(err)
  })
}

async function getDataFromServer(){
 const res = await fetch("http://localhost:3001",{
  method:"GET"
 })
 const data = await res.json()
 console.log(data)
 setFromServer(data)
}

useEffect(()=>{
  getDataFromServer()
},[])

  return (
   <>
   
    <h1>Simple Form Data to mongoose</h1>

    <form onSubmit={handleSubmit}>
      <table>
        <tr>
          <td>Name : </td>
          <td> <input type="text" name='name' onChange={handleChange} /> </td>
        </tr> 
        <tr>
          <td>Password : </td>
          <td> <input type="text" name='password' onChange={handleChange} /> </td>
        </tr>
        <tr>
          <td> </td>
          <td> <input type="submit" value="submit" /> </td>
        </tr>
      </table>
    </form>


<hr />
{
  fromServer.map((data)=>{
    return <>
      <div key={data._id}   >
      <li>Name : {data.name}</li>
      <li>Name : {data.password}</li>
        <br/>
      </div>
    </>
  })
}
   </>
  )
}

export default App
