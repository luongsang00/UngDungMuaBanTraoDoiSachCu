const express = require('express')
const router = express.Router()
const argon2 = require('argon2')
const jwt = require('jsonwebtoken')

const User = require('../models/User')



//@route POST api/auth/register
//@desc Register
//@access Public
router.post('/register', async(req, res)=>{
    const {username, password, email, ngaysinh, gioitinh, diachi, anh}= req.body
    //simple
    if(!username || !password || !email)
    return res.status(400).json({seccess: false, message:'Chưa có tên hoặc mật khẩu hoặc email'})
    try {
        //Check for existing user
        const user = await User.findOne({username})
        if(user)
        return res.status(400).json({seccess: false, message:'Tên người dùng đã được sử dụng'})
        //all good
        const hashedPassword = await argon2.hash(password)
        const newUser = new User({username, password: hashedPassword, email, ngaysinh, gioitinh, diachi, anh })
        await newUser.save()
        //return token
        const accessToken = jwt.sign({userId: newUser._id}, process.env.ACCESS_TOKEN_SECRET)
        res.json({seccess: true, message:'Tạo thành công', accessToken})

    } catch (error) {
        console.log(error)
        res.status(500).json({success: false, message: 'Server hoặc đường truyền lỗi'})
    }
})
//@route POST api/auth/login
//@desc login user
//@access Public
router.post('/login', async(req, res)=>{
    const{username, password} = req.body
    if(!username || !password)
    return res
        .status(400)
        .json({success: false, message: 'Chưa có tên hoặc mật khẩu'})
        try{
            //Check for exitsting user
            const user = await User.findOne({username})
            if(!user)
            return res
                .status(400)
                .json({success: false, message:'Tên đăng nhập hoặc mật khẩu chưa đúng'})
            //Username found
            const passwordValid = await argon2.verify(user.password, password)
            if(!passwordValid)
            return res
                .status(400)
                .json({success: false, message:'Tên đăng nhập hoặc mật khẩu chưa đúng'})
            //all good
            //return token
            const accessToken = jwt.sign(
                {userId: user._id}, 
                process.env.ACCESS_TOKEN_SECRET)

            res.json({
                success: true, 
                message: 'Người dùng đăng nhập không thành công', 
                accessToken})

        }catch(error){
            console.log(error)
            res.status(500).json({success: false, message:'Server hoặc đường truyền lỗi'})
        }
})


module.exports = router