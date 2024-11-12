const mongoose = require("mongoose")

const blogSchema = new mongoose.Schema({
    title: {
        type: String,
        required: true
    },
    description: {
        type: String,
        required: true        
    },
    author: {
        type: String,
        required: true        
    },
    category: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "CategoryModel",
        required: true
    }
}, { timestamps: true })

const BlogModel = mongoose.model("BlogModel", blogSchema)

module.exports = BlogModel 
