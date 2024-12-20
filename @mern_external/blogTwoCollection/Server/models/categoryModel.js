const mongoose = require("mongoose")

const categorySchema = new mongoose.Schema({
    name: {
        type: String,
        required: true
    }
}, { timestamps: true })

const CategoryModel = mongoose.model("CategoryModel", categorySchema)

module.exports = CategoryModel 
