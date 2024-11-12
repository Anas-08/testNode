const mongoose = require("mongoose")

async function dbConnect(){
    try{
        const res = await mongoose.connect("mongodb://localhost:27017/internal")
        if(res){
            console.log("db Connected...")
        }else{
            console.log("db not Connected...")
        }
    }catch(e){
        console.log(e)
        console.log("something went wrong db not Connected...")
    }
}

function dbConnect1(){
    mongoose.connect("mongodb://localhost:27017/internal")
    .then(()=> console.log("db Connected..."))
    .catch(()=> console.log("db not Connected..."))
}

module.exports = dbConnect