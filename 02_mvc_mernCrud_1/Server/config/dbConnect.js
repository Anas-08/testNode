const mongoose = require("mongoose")

async function dbConnect(){
    // method #1 
    // try{
    //     await mongoose.connect("mongodb://localhost:27017/test")
    //     console.log("db connected...")
    // }catch(e){
    //     console.log(error)
    //     console.log("db me error he chhote")
    // }

    // --------------------------------------------
    // method #2
    mongoose.connect("mongodb://localhost:27017/test")
    .then(()=>{
        console.log("db Connected...")
    })
    .catch((e)=>{
        console.log(e)
        console.log("db me error he chhote")
    })
}

// exporting dbConnect function
module.exports = dbConnect