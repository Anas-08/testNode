const express = require("express");

const cors = require("cors")
const bodyParser = require('body-parser')
const mongoose = require('mongoose');

const app = express()

// middleware
app.use(cors()) // for cross origin (it will allow server to accept request from the client)
app.use(bodyParser.json()) // it will parse the json data coming from req(client request)


// mongoose

main().catch(err => console.log(err));

async function main() {
  await mongoose.connect('mongodb://127.0.0.1:27017/test');
  console.log("DB conencted...")

  // use `await mongoose.connect('mongodb://user:password@127.0.0.1:27017/test');` if your database has auth enabled
}

// schema
const userSchema = new mongoose.Schema({
    name: String,
    password: String
  });
// model
const User = mongoose.model('User', userSchema);



// routes / path / endpoint / api 

app.get("/", async(req, res)=>{
   const documents = await User.find({})
   res.json(documents)
    //res.send("main endpoint")
})
app.get("/fetch",(req, res)=>{
    res.send("Testing GET with fetch")
})

app.post("/send",async(req, res)=>{
    console.log(req.body)
    let user = new User()
    user.name = req.body.name
    user.password = req.body.password

    const document = await user.save()
    
    res.json(document)
   // res.send("post request")

})

app.listen(3001,()=>{
    console.log("Running...")
})