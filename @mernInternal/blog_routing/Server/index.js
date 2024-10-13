const express = require("express")
const cors = require("cors")

// require connection
const dbConnect = require("./config/dbConnect")

// require routes
const blogRoute = require("./routes/blogRoutes")


const app = express()

// middleware
app.use(cors())
app.use(express.json())

app.use(blogRoute)

app.get("/",(req, res)=>{
    res.send("server running")
})

app.listen(3001,()=>{
    console.log("server Running on 3001")
    dbConnect()
})