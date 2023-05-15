import express from "express"
import mysql from"mysql"
const app= express()

const db = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "password",
    database:"test"
})
app.get("/",(req,res)=>{
    res.json("hello")

})
app.get("/user",(req,res)=>{
    const q= "SELECT * FROM user"
    db.query(q,(err,data)=>{
        if(err) return res.json(err)
        return res.json(data)
    })

})

app.listen(8800,() =>{
    console.log("Connected");
})

