const express = require("express");
const cors = require("cors")

// getting dbConnect function 
const dbConnect = require("./config/dbConnect"); 

// getting/importing model
// const FormReg1 = require("./models/formRegSchema");

// importing routes
const formRoute = require('./routes/formRoute')

const app = express()

// middleware
app.use(express.json())
app.use(cors())

// using routes (from the import routes)
// app.use("/",formRoute)
app.use(formRoute)

app.get("/",(req, res)=>{
    res.send("Testing")
})

// // creating user
// app.post("/createUser", async(req, res)=>{
//     try{
//         console.log(req.body)
//         const userData = req.body
//         const formReg1 = new FormReg1(userData)
//         const document = await formReg1.save()
//         res.status(200).json({"message":"insert success","value":document})
//     }catch(error){
//         res.status(500).json({"message":"insert not success","value":error})
//     }
// })

// // get all users
// app.get("/allUsers", async(req, res)=>{
//     try{
//         const documents = await FormReg1.find({})
//         res.status(200).json({"message":"Record Found","value":documents})
//     }catch(error){
//         res.status(500).json({"message":"no record found","value":error})
//     }
// })

// // get single users
// app.get("/singleUser/:id", async(req, res)=>{
//     try{
//         const id = req.params.id
//         const document = await FormReg1.findById({_id : id})
//         res.status(200).json({"message":"Record Found","value":document})
//     }catch(error){
//         res.status(500).json({"message":"no record found","value":error})
//     }
// })

// // update users
// app.put("/updateUser/:id", async(req, res)=>{
//     try{
//         const id = req.params.id
//         const document = await FormReg1.findByIdAndUpdate({_id : id},req.body,{new:true})
//         res.status(200).json({"message":"Record updated","value":document})
//     }catch(error){
//         res.status(500).json({"message":"record not updated","value":error})
//     }
// })
// // delete users
// app.delete("/deleteUser/:id", async(req, res)=>{
//     try{
//         const id = req.params.id
//         const document = await FormReg1.findByIdAndDelete({_id : id})
//         res.status(200).json({"message":"Record deleted","value":document})
//     }catch(error){
//         res.status(500).json({"message":"record not deleted","value":error})
//     }
// })

app.listen(3001,()=>{
    console.log("Running...")
    dbConnect()
})