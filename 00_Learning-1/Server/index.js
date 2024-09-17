const express = require("express");

const app = express()


// Routes
app.get("/",(req, res)=>{
    res.send("Testing")
})

app.listen(3001,()=>{
    console.log("Running...")
})