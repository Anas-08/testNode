const express = require("express");
const  mongoose = require("mongoose");

const cors = require("cors")

const app = express()

//middleware
app.use(express.json())
app.use(cors())

// db connection
mongoose.connect("mongodb://127.0.0.1:27017/test")
.then(()=>{
    console.log("DB Connected...")
})
.catch((err)=>{
    console.log(err)
})

// schema
const crudSchema = mongoose.Schema({
    // name:String,
    // email:String,
    // password : String
    name:{
        type: String,
        required:true
    },
    email:{
        type: String,
        required:true
    },
    password:{
        type: String,
        required:true
    }
},{timestamps:true})

// model
const Crud1 = mongoose.model("Crud1",crudSchema)

// routes
app.get("/",(req, res)=>{
    res.send("Testing")
})

// for creating user
app.post("/createUser", async(req, res)=>{
   try{
    const bodyData = req.body
    const crud1 = new Crud1(bodyData)
    const document = await crud1.save()
    res.status(200).json({message:"successfully Regsistered",data:document})
}catch(err){
    res.status(500).json({message:"Not Regsistered",data:err})
   }
})

// to get all the users
app.get("/getAllUsers", async(req, res)=>{
    try{
        const usersData = await Crud1.find({})
      //  res.status(200).json({message:"Record Found",data:usersData})
        res.status(200).send(usersData)
    }catch(err){
        res.status(500).json({message:"No Records Found ",data:err})
    }
})

// get single user by id
app.get("/getUser/:id",async(req, res)=>{
    try{
        const id = req.params.id
        const singleUser = await Crud1.findById({_id:id})
        res.status(200).json({message:"Record Found",data:singleUser})
    }catch(err){
        res.status(500).json({message:"Record Not Found",data:err})
    }
}) 

// update user by id
app.put("/updateUser/:id", async(req, res)=>{
    try{
        const id = req.params.id
        const singleUserData = await Crud1.findByIdAndUpdate({_id:id}, req.body, {new:true})
        res.status(200).json({message:"Record Updated",data:singleUserData})
    }catch(err){
        res.status(500).json({message:"Record Not Updated",data:err})
    }
})

// delete user by id
app.delete("/deleteUser/:id",async(req, res)=>{
    try{
        const id = req.params.id
        const deleteUser = await Crud1.findByIdAndDelete({_id:id})
        res.status(200).json({message:"Record deleted",data:deleteUser})
    }catch(err){
        res.status(500).json({message:"Record Not deleted",data:err})
    }
})

app.listen(3001,()=>{
    console.log("Running...")
})