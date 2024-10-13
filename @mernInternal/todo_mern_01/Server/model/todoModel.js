const mongoose = require("mongoose")

const todoSchema = new mongoose.Schema({
    name : {
        type : String,
        required : true
    }
}, {timestamps : true})

const Todo1 = mongoose.model("Todo1", todoSchema)

module.exports = Todo1