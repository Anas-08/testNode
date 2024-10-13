const express = require("express")

const cors = require("cors")

const dbConnect = require("./config/dbConnect")

const todoRoute= require("./routes/todoRoutes")

const app = express()

// middleware

app.use(express.json())
app.use(cors())

app.use("/",todoRoute)

app.get("/", (req, res)=>{
    res.send("server started")
})

app.listen(3001, ()=>{
    console.log("server running on 3001")
    dbConnect()
})