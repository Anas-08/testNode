const express = require("express")

const route =  express.Router()

// require model
const product1 = require("../models/productModel")

// for inserting product
route.post("/products", async(req, res)=>{
    try{
        const data = req.body
        const product = new product1(data)
        const document = await product.save()
        res.status(200).json({"message": "inserted", "value" : document})
    }catch(err){
        res.status(500).json({"message": "not inserted", "value" : err})
    }
})

// for fetching product
route.get("/products", async (req, res)=>{
    try{
        const documents = await product1.find()
        res.status(200).json({"message" : "product found", "value" : documents})
    }catch(err){
        res.status(500).json({"message": "product not found", "value" : err})
    }
})

// get single product 
route.get("/products/:id", async(req, res)=>{
    try{
        const id = req.params.id
        const document =  await product1.findById({_id : id})
        res.status(200).json({"message" : "product found", "value" : document})
    }catch(err){
        res.status(500).json({"message": "product not found", "value" : err})
    }
})



module.exports = route