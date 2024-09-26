const express = require("express");
const cors = require("cors")

// getting dbConnect function 
const dbConnect = require("./config/dbConnect"); 

// getting/importing model
// const FormReg1 = require("./models/formRegSchema");

// importing routes
const formRoute = require('./routes/formRoute')

const app = express()

// middleware
app.use(express.json())
app.use(cors())

// using routes (from the import routes)
// app.use("/",formRoute)
// app.use(formRoute)
app.use("/question1",formRoute)

app.get("/",(req, res)=>{
    res.send("Testing")
})

app.listen(3001,()=>{
    console.log("Running...")
    dbConnect()
})