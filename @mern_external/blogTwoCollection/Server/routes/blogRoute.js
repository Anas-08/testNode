const express = require("express")

const route = express.Router()

// import model
const blogModel = require('../models/blogModel')

route.post('/blogs', async(req, res)=>{
    try{
        console.log(req.body)
        const data = req.body
        const blog = new blogModel(data)
        const document = await blog.save()
        res.status(200).json({"message": "blog inserted", "data": document})
    }catch(e){
        res.status(500).json({"message": "blog not inserted", "data": e })
    }
})

route.get('/blogs', async(req, res)=>{
    try{
        const documents = await blogModel.find().populate("category")
        res.status(200).json({"message": "data found", "data": documents})
    }catch(e){
        res.status(500).json({"message": "data not found", "data": e})
    }
})

// route.get('/blogs', async(req, res)=>{
//     try{
//         const documents = await blogModel.find()
//         res.status(200).json({"message": "data found", "data": documents})
//     }catch(e){
//         res.status(500).json({"message": "data not found", "data": e})
//     }
// })

route.delete('/blogs/:id', async(req, res)=>{
    try{
        const id = req.params.id
        const documents = await blogModel.findByIdAndDelete(id)
        res.status(200).json({"message": "data deleted", "data": documents})
    }catch(e){
        res.status(500).json({"message": "data not deleted", "data": e})
    }
})


module.exports = route