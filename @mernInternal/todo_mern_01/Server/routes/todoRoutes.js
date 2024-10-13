// import express
const express = require("express")

//  import mongoose
const mongoose = require("mongoose")


// import the model, to work with
const Todo1 = require("../model/todoModel")

// create router
const route = express.Router()

// post(insert)
route.post("/todos", async(req, res)=>{
    try{
        console.log(req.body)
        const data = req.body
        const todo = new Todo1(data)
        const document = await todo.save()
        res.status(200).json({"message": "todo inserte", "value": document})
    }catch(err){
        res.status(500).json({"message":"todo not inserted", "value": err})
    }
})

// get(get data)
route.get("/todos", async(req, res)=>{
    try{
        const documents = await Todo1.find()
        res.status(200).json({"message": "data found", "value": documents})
    }catch(err){
        res.status(500).json({"message": "data not found", "value":err })
    }
})

// get data by id
route.get("/todos/:id", async(req, res)=>{
    try{
        const id = req.params.id
        const singleDocument = await Todo1.findById({_id : id})
        res.status(200).json({"message":"id data found", "value": singleDocument}) 
    }catch(err){
        res.status(500).json({"message":"id data not found", "value": err}) 
    }
})

// update
route.put("/todos/:id", async(req, res)=>{
    try{
        console.log(req.params.id)
        const id = req.params.id
        const updateSingle = await Todo1.findByIdAndUpdate({_id : id }, req.body, {new : true})
        res.status(200).json({"message": "todo updated", "value": updateSingle})
    }catch(err){
        res.status(500).json({"message": "todo not updated", "value": err})
    }
})

// delete
route.delete("/todos/:id", async(req, res)=>{
    try{    
        const id = req.params.id
        const singleDelete = await Todo1.findByIdAndDelete({_id:id})
        res.status(200).json({"message": "deleted", "value": singleDelete})
    }catch(err){
        res.status(500).json({"message": "not deleted", "value": err})
    }
})




module.exports = route

