const express = require("express");

const cors = require("cors")
const bodyParser = require('body-parser')
const mongoose = require("mongoose")

const app = express() // create instance of express


// ----------------------------------------------------------------------
// middleware
app.use(cors()) // for cross origin (it will allow server to accept request from the client)
//   app.use(bodyParser.json()) 
//app.use(bodyParser.json()) // it will parse the json data coming from req(client request)
// app.use(bodyParser.urlencoded({ extended: true })) 
 app.use(express.json());
 //app.use(express.urlencoded({ extended: true }))


// ----------------------------------------------------------------------
// create DB connection also (schema and model),(we cna create this in separate file also )
async function main(){
    await mongoose.connect('mongodb://127.0.0.1:27017/test')
    console.log("DB conencted...")
}

main().catch( err => console.log(err))

// schema 
const registerSchema = new mongoose.Schema({
    name:String,
    email: String,
    password : String
})

// model
const Reg1 = mongoose.model("Reg1",registerSchema)

// ----------------------------------------------------------------------
// routes / API / endpoint / path
// mainendpoint
app.get("/",(req, res)=>{
    res.send("Testing")
})

app.post("/register", async(req, res)=>{
    console.log(req.body)
    const {name, email, password } = req.body
    // const auth = Reg1.findOne({email:email})
    // .then( (err,user) =>{
    //     if(user){
           
    //         res.status(500).json({message: "User Already Registered",data:err})
    //     }else{
    //         const user = new Reg1()
    //         user.name = req.body.name
    //         user.email = req.body.email
    //         user.password = req.body.password
    //         const document =  user.save()
    //         res.status(200).json({message: "User Registered successfully",data:document})
    //     }
    // })
    const user = new Reg1()
    user.name = req.body.name
    user.email = req.body.email
    user.password = req.body.password
    const document = await user.save()
    // .then((doc)=>{
    //     res.status(200).json({message: "Data Posted",data:doc})
    // })
    // .catch((err)=>{
    //     res.status(500).json({message: "Data Not Posted",data:err})
    // })
    // console.log(typeof document)

    res.status(200).json({message: "Data Posted",data:document})
    // second method(old) callback wala (no longer accept callback)
    // const {name, email, password } = req.body
    // const user1 = new Reg1({
    //     name,
    //     email,
    //     password
    // })
    // user1.save(err=>{
    //     if(err)
    //         res.send(err)
    //     else
    //         res.send({message: "successfully registered"})
    // })  

//    res.send("post is working")
    
})

app.listen(3001,()=>{
    console.log("Running...")
})