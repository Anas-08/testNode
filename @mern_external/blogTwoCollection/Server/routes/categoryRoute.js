const express = require("express")

const route = express.Router()

// import model
const categoryModel = require('../models/categoryModel')

route.post('/categorys', async(req, res)=>{
    try{
        console.log(req.body)
        const blog = new categoryModel(req.body)
        const document = await blog.save()
        res.status(200).json({"message": "inserted", "data": document})
    }catch(e){
        res.status(500).json({"message": "not inserted", "data": e})
    }
})

route.get('/categorys', async(req, res)=>{
    try{
        const documents = await categoryModel.find()
        res.status(200).json({"message": "data found", "data": documents})
    }catch(e){
        res.status(500).json({"message": "data not found", "data": e})
    }
})


module.exports = route