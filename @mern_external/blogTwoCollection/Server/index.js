const express = require("express")
const cors = require("cors")
const app = express()

// import db
const dbConnect = require("./config/dbConnect")

// import routes
const blogRoute = require("./routes/blogRoute")
const categoryRoute = require("./routes/categoryRoute")

// middleware
app.use(cors())
app.use(express.json())

app.use("/question1", blogRoute)
app.use("/question1", categoryRoute)

app.get('/', (req, res)=>{
    res.send("Server Running on 3002...")
})

app.listen(3002, ()=>{
    console.log("Server Started on 3002...")
    dbConnect()
})