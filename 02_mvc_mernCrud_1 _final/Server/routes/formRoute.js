const express = require("express")

// getting/importing model
const FormReg1 = require("../models/formRegSchema");

const route = express.Router()

// creating user
route.post("/createUser", async(req, res)=>{
    try{
        console.log(req.body)
        const userData = req.body
        const formReg1 = new FormReg1(userData)
        const document = await formReg1.save()
        res.status(200).json({"message":"insert success","value":document})
    }catch(error){
        res.status(500).json({"message":"insert not success","value":error})
    }
})

// get all users
route.get("/allUsers", async(req, res)=>{
    try{
        const documents = await FormReg1.find({})
        res.status(200).json({"message":"Record Found","value":documents})
    }catch(error){
        res.status(500).json({"message":"no record found","value":error})
    }
})

// get single users
route.get("/singleUser/:id", async(req, res)=>{
    try{
        const id = req.params.id
        const document = await FormReg1.findById({_id : id})
        res.status(200).json({"message":"Record Found","value":document})
    }catch(error){
        res.status(500).json({"message":"no record found","value":error})
    }
})

// update users
route.put("/updateUser/:id", async(req, res)=>{
    try{
        const id = req.params.id
        const document = await FormReg1.findByIdAndUpdate({_id : id},req.body,{new:true})
        res.status(200).json({"message":"Record updated","value":document})
    }catch(error){
        res.status(500).json({"message":"record not updated","value":error})
    }
})

// delete users
route.delete("/deleteUser/:id", async(req, res)=>{
    try{
        const id = req.params.id
        const document = await FormReg1.findByIdAndDelete({_id : id})
        res.status(200).json({"message":"Record deleted","value":document})
    }catch(error){
        res.status(500).json({"message":"record not deleted","value":error})
    }
})
// exporting route
module.exports = route