const express = require("express");
const mongoose = require("mongoose")


const app = express()

//mongoose connection
mongoose.connect("mongodb://127.0.0.1:27017/test")
.then(()=>{
    console.log("Db Connected...")
})
.catch((err)=>{
    console.log(err)
})

// create schema
const createSchema = new mongoose.Schema({
    name: String,
    email : String,
    password : String
})

// model
const User2 = mongoose.model("User2",createSchema)

 async function createUser(){
    try{
        // method one 
        const userData = await User2.create({name : "test1", email : "test1@gmail.com", password : "123"})
        console.log(userData)
    }catch(err){
        console.log(err)
    }
}
createUser()

app.get("/",(req, res)=>{
    res.send("Testing")

})

app.listen(3001,()=>{
    console.log("Running...")
})