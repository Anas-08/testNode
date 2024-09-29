const mongoose = require("mongoose")


const blogSchema = new mongoose.Schema({
    name:{
        type : String,
        required : true
    },
    description:{
        type : String,
        required : true
    },
    type:{
        type : String,
        required : true
    }   
},{timestamps : true})


const Blog1 = mongoose.model("Blog1",blogSchema)

module.exports = Blog1