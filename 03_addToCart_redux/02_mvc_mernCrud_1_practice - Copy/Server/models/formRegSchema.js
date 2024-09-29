const mongoose = require("mongoose")

const formRegSchema = new mongoose.Schema({
    name:{
        type : String,
        required : true
    },
    email:{
        type : String,
        required : true
    },
    password:{
        type : String,
        required : true
    },
    mobile:{
        type : String,
        required : true
    },
    address:{
        type : String,
        required : true
    },
    gender:{
        type : String,
        required : true
    },
    course:{
        type : String,
        required : true
    }
},{timestamps : true})

const FormReg1 = mongoose.model("FormReg1",formRegSchema)

// exporting model
module.exports = FormReg1