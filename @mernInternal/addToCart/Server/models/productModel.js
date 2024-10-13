const mongoose = require("mongoose")

const productSchema = new mongoose.Schema({
    productName : {
        type : String,
        required : true
    }, 
    productCategory : {
        type : String,
        required : true
    },
    productPrice : {
        type : Number, 
        required : true
    },
    ProductQuantity: {
        type : Number,
        required : true
    }
}, {timestamps : true})

const product1 = mongoose.model("product1", productSchema)

module.exports = product1