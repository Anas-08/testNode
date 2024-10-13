import React, { useEffect, useState } from 'react'
import axios from 'axios'    

const Todo = () => {
    
    const [task, setTask] = useState({
        name : ""
    })

    const [data, setData] = useState([])

    const [id, setId] = useState(null)
  
    function handleChange(e){
        const name = e.target.name
        const value = e.target.value
        setTask({           
            ...task,
            [name] : value
        })
    }

    async function insert(){
        try{
            const res = await axios.post("http://localhost:3001/todos", task)            
            if(res.status === 200){
                alert("inserted")
            }
        }catch(err){
            console.log(err)
        }
    }

   async function update(){
        try{
            const res = await axios.put(`http://localhost:3001/todos/${id}`, task)
            if(res.status === 200){
                alert("update")
            }
        }catch(err){
            console.log(err)
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

        setTask({
            name : ""
        }) 
        getData()
    }

    async function getData(){
        try{
            const res = await axios.get("http://localhost:3001/todos") 
            setData(res.data.value)
        }catch(err){
            console.log(err)
        }
    }

    async function handleDelete(id){
        try{
            const res = await axios.delete(`http://localhost:3001/todos/${id}`)
            if(res.status === 200){
                alert("Record Deleted")
                getData()
            }
        }catch(err){
            console.log(err)
        }
    }

    function handleEdit(item){
        setTask({
            name : item.name
        })
        setId(item._id)
    }
    useEffect(()=>{
        getData()
    },[])

    return (
    <>

        <center>
            <h1>Todo App</h1>
            <h2>Insert</h2>
        <form action="" onSubmit={handleSubmit}>
        <table>
            <tr>
                <td><input type="text" placeholder='enter your task' name='name' value={task.name} onChange={handleChange} requird /></td>
            </tr>
            <tr>
                <td><input type="submit" name='submit' value={!id ? "Add Task" : "Update Task" } />   </td>
            </tr>
        </table>    
        </form> 


        <br />
        <br />
        <hr />
        <br />
        <br />

        <h2>Display</h2>

        <br />
        <br />
        {
            data.map((item, index)=>(
                <div key={index} style={{display:'flex', gap:'12px', alignItems:'center', justifyContent:'center', padding: '4px', margin:'2px'}}>
                    <h3>{item.name}</h3>
                    <button onClick={()=>handleDelete(item._id)}> Delete</button>
                    <button onClick={()=>handleEdit(item)}> Edit</button>
                </div>                 
            ))
        }
        </center>
    </>
  )
}

export default Todo
