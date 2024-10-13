const express = require("express")
const cors = require("cors")
const app = express()

// require connection
const dbConnect = require("./config/dbConnect")

// require routes
const productRoute = require("./routes/productRoutes")

// middleware
app.use(express.json())
app.use(cors())

app.use(productRoute)

app.get("/", (req, res)=>{
    res.send("server started")
})

app.listen(3001, ()=>{
    console.log("Server running on 3001")
    dbConnect()
})