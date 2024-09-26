const express = require("express");
const mongoose = require("mongoose")
const cors = require("cors")
const app = express()

// middleware
app.use(express.json())
app.use(cors())

// db connect
mongoose.connect("mongodb://127.0.0.1:27017/test")
.then(()=>{
    console.log("DB Conneted...")
})
.catch((err)=>{
    console.log(err)
})

// create schema
const schema = new mongoose.Schema({
    name:{
        type : String,
        required : true
    },
    email:{
        type : String,
        required : true
    },
    password:{
        type : String,
        required : true
    },
    mobile:{
        type : String,
        required : true
    },
    address:{
        type : String,
        required : true
    },
    gender:{
        type : String,
        required : true
    },
    course:{
        type : String,
        required : true
    },
}, {timestamps : true})

// create model
const Crud3 = new mongoose.model("Crud3", schema)

// routes
app.get("/",(req, res)=>{
    res.send("Testing")

})

// user data post
app.post("/createUser",async (req, res)=>{
    try{
        const userData = req.body
        const crud3 =  new Crud3(userData)
        const document = await crud3.save()
        res.status(200).json(document)
    }catch(err){
        res.status(500).json(err)
    }
})

// get all the user
app.get("/getAllUsers", async(req, res)=>{
    try{
        const getUsers = await Crud3.find({})
        res.status(200).json(getUsers)
    }catch(err){
        res.status(500).json(err)
    }
})

// get single user by id
app.get("/getSingleUser/:id", async (req, res)=>{
    try{
        const id = req.params.id
        const singleUser = await Crud3.findById({_id : id})
        res.status(200).json(singleUser)
    }catch(err){
        res.status(500).json(err)
    }
}) 

// update by id
app.put("/updateUser/:id", async (req, res)=>{
    try{
        const id = req.params.id
        const updateUser = await Crud3.findByIdAndUpdate({_id : id},req.body,{new:true})
        res.status(200).json(updateUser)
    }catch(err){
        res.status(500).json(err)
    }
}) 

// delete by id
app.delete("/deleteUser/:id", async (req, res)=>{
    try{
        const id = req.params.id
        const deleteUser = await Crud3.findByIdAndDelete({_id : id})
        res.status(200).json(deleteUser)
    }catch(err){
        res.status(500).json(err)
    }
}) 

app.listen(3001,()=>{
    console.log("Running...")
})