const express = require("express")
const cors = require("cors")


const app = express()

// middleware
app.use(cors())
app.use(express.json())

app.get('/', (req, res)=>{
    res.send("Server Running on 3002...")
})

app.listen(3002, ()=>{
    console.log("Server Sarted on 3002...")
})