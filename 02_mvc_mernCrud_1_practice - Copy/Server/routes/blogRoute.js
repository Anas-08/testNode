const express = require("express")

// import blog model
const Blog1 = require('../models/blogSchema')

// use router
const route = express.Router()

// for creating blog
route.post("/blog", async(req, res)=>{
    try{
        console.log(req.body)
        const data = req.body
        const blog = new Blog1(data)
        const document = await blog.save()
        res.status(200).json({"message":"blog is posted", "value":document })
    }catch(err){
        res.status(500).json({"message":"blog is not posted", "value":err })
    }
})

//  get blog
route.get("/blog", async(req, res)=>{
    try{
        const documents = await Blog1.find()       
        res.status(200).json({"message":"blog is found", "value":documents })
    }catch(err){
        res.status(500).json({"message":"blog is not found", "value":err })
    }
})

//  get by id blog
route.get("/blog/:id", async(req, res)=>{
    try{
        const id = req.params.id
       const document = await Blog1.findById({ _id : id})    
        res.status(200).json({"message":"blog is found", "value":document })
    }catch(err){
        res.status(500).json({"message":"blog is not found", "value":err })
    }
})

//  update by id blog
route.put("/blog/:id", async(req, res)=>{
    try{
        const id = req.params.id
       const document = await Blog1.findByIdAndUpdate({ _id : id}, req.body, {new : true})    
        res.status(200).json({"message":"blog is updated", "value":document })
    }catch(err){
        res.status(500).json({"message":"blog is not updated", "value":err })
    }
})

//  delete by id blog
route.delete("/blog/:id", async(req, res)=>{
    try{
        const id = req.params.id
       const document = await Blog1.findByIdAndDelete({ _id : id})    
        res.status(200).json({"message":"blog is deleted", "value":document })
    }catch(err){
        res.status(500).json({"message":"blog is not deleted", "value":err })
    }
})


module.exports = route