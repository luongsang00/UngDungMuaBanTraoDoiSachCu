const express = require('express')
const { Mongoose } = require('mongoose')
const router = express.Router()

const GioHang = require('../models/GioHang')

router.post('/', async(req, res)=>{
    const {tensach, tonggia, soluong}= req.body
    try {
        const newBook = new GioHang({
            tensach, tonggia, soluong
            })
        await newBook.save()
        res.json({success: true, message:'Nhập thành công', post: newBook})
    } catch (error) {
        console.log(error)
        res.status(500).json({success: false, message:'Server hoặc đường truyền lỗi'})
        
    }
})

module.exports= router