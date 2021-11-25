require('dotenv').config()
const express = require('express');
const mongoose = require('mongoose')
const cors = require('cors')

const authRouter = require('./routes/auth')
const bookRouter = require('./routes/book')
const giohangRouter = require('./routes/giohang')


const connectDB = async()=>{
    try {
        await mongoose.connect(`mongodb+srv://${process.env.DB_USERNAME}:${process.env.DB_PASSWORD}@mern-learningnit.082hr.mongodb.net/DoAn1?retryWrites=true&w=majority`,{
            useNewUrlParser: true,
            useUnifiedTopology: true

        })
        console.log('MongoDB đang kết nối')
    } catch (error) {
        console.log(error.message)
        process.exit(1)
    }
}

connectDB()
const app = express()
app.use(express.json())
app.use(cors())

app.use('/api/auth', authRouter)
app.use('/api/book', bookRouter)
app.use('/api/giohang', giohangRouter)





const PORT = 5000;

app.listen(PORT, ()=> console.log(`Sever đang chạy trên cổng ${PORT}`))