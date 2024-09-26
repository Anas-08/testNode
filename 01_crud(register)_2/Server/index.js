const express = require("express");
const mongoose = require("mongoose")
const cors = require("cors")
const app = express()


// middleware
app.use(express.json())
app.use(cors())


// mongodb connection
mongoose.connect("mongodb://127.0.0.1:27017/test")
.then(()=>{
    console.log("DB Connected...")
})
.catch((err)=>{
    console.log(err)
})

// create schema
const userSchema = mongoose.Schema({
    name:{
        type:String,
        required:true
    },
    email:{
        type:String,
        required:true
    },
    mobile:{
        type:String,
        required:true
    },
    password:{
        type:String,
        required:true
    },  
    gender:{
        type:String,
        required:true
    },    
    course:{
        type:String,
        required:true
    },
},{timestamps:true})

// create model
const Crud2 = mongoose.model("Crud2", userSchema)

// routes
app.get("/",(req, res)=>{
    res.send("Testing")
})

// creating user
app.post("/createUser", async(req, res)=>{
    try{
        console.log(req.body)
        const bodyData = req.body 
        const crud2 = new Crud2(bodyData)
        const document = await crud2.save()
        res.status(200).json(document)
    }catch(err){
        res.status(500).json(err)
    }
})

// get all user
app.get("/allUsers", async(req, res)=>{
    try{
        const userData = await Crud2.find({})
        res.status(200).json(userData)
    }catch(err){
        res.status(500).json(err)
    }
})

// get single user
app.get("/singleUser/:id", async(req, res)=>{
    try{
        const id = req.params.id
        const singleUser = await Crud2.findById({_id:id})
        res.status(200).json(singleUser)
    }catch(err){
        res.status(500).json(err)
    }
})

// update user
app.put("/updateUser/:id", async(req, res)=>{
    try{
        const id = req.params.id
        const updatedUser = await Crud2.findByIdAndUpdate({_id: id}, req.body, {new:true})
        res.status(200).json(updatedUser)
    }catch(err){
        res.status(500).json(err)
    }
})

// delete user
app.delete("/deleteUser/:id",async(req, res)=>{
    try{
        const id = req.params.id
        const deletedUser = await Crud2.findByIdAndDelete({_id:id})
        res.status(200).json(deletedUser)
    }catch(err){
        res.status(500).json(err)
    }
})

app.listen(3001,()=>{
    console.log("Running...")
})