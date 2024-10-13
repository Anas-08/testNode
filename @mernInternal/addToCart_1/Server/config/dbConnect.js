const mongoose = require("mongoose")


async function dbConnect(){
    try{
        await mongoose.connect("mongodb://localhost:27017/internal")
        console.log("db connected")
    }catch(e){
        console.log(e)
        console.log("db not connected")
    }
}

module.exports = dbConnect