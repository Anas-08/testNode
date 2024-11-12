
const mongoose = require("mongoose")

async function dbConnect(){
    try{
       const res = await mongoose.connect("mongodb://localhost:27017/external")
       if(res){
        console.log("db connected...")
       }else{
        console.log("db not connected...")
       }      
    }catch(e){
        console.log(e)
    }   
}

function dbConnect1(){
    mongoose.connect("mongodb://localhost:27017/external")
    .then(()=> console.log("db Connected..."))
    .catch(()=> console.log("db not Connected..."))
}

module.exports = dbConnect