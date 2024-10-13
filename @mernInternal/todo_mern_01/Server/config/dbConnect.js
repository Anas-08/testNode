const mongoose = require("mongoose")

// first method
async function dbConnect(){
    try{
        await mongoose.connect("mongodb://localhost:27017/internal");
        console.log("db connected")
    }catch(e){
        console.log(e)
        console.log("db not connected")
    }
}

// second method
// function dbConnect1(){
//     mongoose.connect("mongodb://localhost:27017/internal")
//     .then(()=>{
//         console.log("db connected")
//     })
//     .catch((e)=>{
//         console.log(e)
//         console.log("db not connected")
//     })
// }

module.exports = dbConnect