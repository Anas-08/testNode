// 
import express from "express"
import cors from "cors"
import mongoose from "mongoose"

// express instance
const app = express()

app.use(express.json())
app.use(express.urlencoded())
app.use(cors())

mongoose.connect("mongodb://localhost:27017/myTestingDB")
.then(()=>{
    console.log("DB Connected.....")
})
.catch((err)=>{
    console.log(err)
})

// mongoose schema and modles
const userSchema = new mongoose.Schema({
    name : String,
    email : String,
    password : String 
})

const User = new mongoose.model("User", userSchema)

// async function connectDb(){
//     try{
//         await 
//         console.log("Database Connected...")
//     }catch(err){
//         console.log(err)
//     }
// }

// Routes
app.get("/",(req,res)=>{
    res.send("Backend")
})

app.post("/login" ,(req, res) => {
    res.send("login api")
})

app.post("/register",(req, res)=>{
    // res.send("register api")
    // console.log( req.body )
    const {name, email, password} = req.body

    // to check if user already register
    // User.findOne({email: email}, (err, user)=>{
    //     // if user found
    //     if(user){
    //         res.send({message:"user already register"})
    //     }else{ // if user not found
    //         const user = new User({
    //             name, 
    //             email, 
    //             password
    //         })
        
    //         user.save(err=>{
    //             if(err){
    //                 console.log(err)
    //                 res.send(err)
    //             }else{
    //                 res.send({message:" successfully register "})   
    //             }
    //         })
    //     }
    // })  
    User.findOne({email: email})
    .then((user)=>{
        if(user){
            res.send({message:"user already register"})
        }else{ // if user not found
            const user = new User({
                name, 
                email, 
                password
            })
        
            user.save()
            .then(()=>{
                
                    res.send({message:" successfully register "})                    
                
            })

        }
    })
    .catch((err)=>{
        console.log(err)
    })
  

    // const user = new User({
    //     name, 
    //     email, 
    //     password
    // })

    // user.save(err=>{
    //     if(err){
    //         console.log(err)
    //         res.send(err)
    //     }else{
    //         res.send({message:" successfully register "})   
    //     }
    // })

})


app.listen(3001, () => {
    console.log("Server Running..")
    // connectDb()
})

