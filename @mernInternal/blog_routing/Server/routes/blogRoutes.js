// require express

const express = require("express")
const route = express.Router()

// require model
const Blog1 = require("../models/blogModel")


// insert 
route.post("/blogs", async (req, res)=>{
    try{
        console.log(req.body)
        const data = req.body
        const blog = new Blog1(data)
        const document = await blog.save()
        res.status(200).json({"message":"blog inserted", "value": document})
    }catch(err){
        res.status(500).json({"message":"blog not inserted", "value": err})
    }
})

// get
route.get("/blogs", async(req, res)=>{
    try{
        const documents = await Blog1.find()
        res.status(200).json({"message":"data found", "value":documents})
    }catch(err){
        res.status(500).json({"message":"data not found", "value":err})
    }
})

// get single data 
route.get("/blogs/:id",async(req, res)=>{
    try{
        console.log(req.params.id)  
        const id = req.params.id
        const document = await Blog1.findById({_id : id})
        res.status(200).json({"message":"data found", "value":document})
    }catch(err){
        res.status(500).json({"message":"data not found", "values":err})
    }
})

// update
route.put("/blogs/:id", async(req, res)=>{
    try{
        console.log(req.body)
        console.log(req.params.id)
        const id = req.params.id
        const singleUpdate = await Blog1.findByIdAndUpdate({_id:id}, req.body, {new:true})
        res.status(200).json({"message":"updated", "value": singleUpdate})
    }catch(err){
        res.status(500).json({"message":"not updated", "value":err})
    }
})

// delete
route.delete("/blogs/:id", async(req, res)=>{
    try{
        console.log(req.params.id)
        const id = req.params.id
        const singleDelete = await Blog1.findByIdAndDelete({_id:id})
        res.status(200).json({"message":"deleted", "value":singleDelete})
    }catch(err){
        res.status(500).json({"message":"not deleted", "value": err})
    }
})

// export route
module.exports = route