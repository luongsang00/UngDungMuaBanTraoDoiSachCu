const express = require('express')
const { Mongoose } = require('mongoose')
const router = express.Router()
const verifyToken = require('../middleware/auth')
const Book = require('../models/Book')




//@route POST api/book
//@desc Create book
//@access Private
router.post('/', verifyToken, async(req, res)=>{
    const {tensach, tacgia, gia, soluong, chusach,mota }= req.body
    //simple validation
    if(!tensach)
    return res.status(400).json({success: false, message: 'Chưa nhập tên sách'})
    try {
        const newBook = new Book({
            tensach, 
            tacgia, 
            soluong,
            gia,
            mota,
            chusach: req.userId
            })
        await newBook.save()
        res.json({success: true, message:'Nhập thành công', post: newBook})
    } catch (error) {
        console.log(error)
        res.status(500).json({success: false, message:'Server hoặc đường truyền lỗi'})
        
    }
})

//@route PUT api/book
//@desc Update book
//@access Private
router.put('/:id', verifyToken, async(req, res)=>{
    const{tensach, tacgia, gia, soluong,mota} = req.body
    //simple validation
    if(!tensach)
    return res.status(400).json({success: false, message: 'Chưa nhập tên sách'})
    try {
        let updateBook = {
            tensach, 
            tacgia, 
            soluong,
            gia,
            mota
        }
        const postUpdateCondition = {_id: req.params.id, chusach: req.userId}
        updatePost = await Book.findByIdAndUpdate(postUpdateCondition, updateBook, {new: true})

        // người dùng không được phép cập nhật sách hoặc sách không được tìm thấy
        if(!updateBook)
        return res.status(401).json({success: false, message: 'Không tìm thấy sách hoặc người dùng không được ủy quyền'})
        res.json({success: true, message: 'Cập nhật thành công', updateBook })
    } catch (error) {
        console.log(error)
        res.status(500).json({success: false, message:'Server hoặc đường truyền lỗi'})
        
    }
} )
//@route DEL api/book
//@desc Delete book
//@access Private
router.delete('/:id', verifyToken, async(req, res)=>{
    try {
        const bookDeleteCondition = {_id: req.params.id, chusach : req.userId}
        const deleteBook = await Book.findByIdAndDelete(bookDeleteCondition)
        //User not authorised or post not found
        if(!deleteBook)
        return res.status(401).json({success: false, message: 'Không tìm thấy sách hoặc người dùng không được ủy quyền'})
        res.json({success: true, message: 'Xóa thành công', post: deleteBook })

    } catch (error) {
        console.log(error)
        res.status(500).json({success: false, message:'Server hoặc đường truyền lỗi'})
        
    }
})
//@route GET api/book
//@desc Get books by owner
//@access Private
router.get('/', verifyToken, async(req, res)=>{
    try {
        const books = await Book.find({chusach: req.userId}).populate('chusach', ['username', 'email'])
        //const books = await Book.find({_Id}).populate('user', ['username'])
        res.json({success: true, books})
    } catch (error) {
        console.log(error)
        res.status(500).json({success: false, message:'Server hoặc đường truyền lỗi'})
    }
})

//@route GET api/book 
//@desc Get a book
//@access Private
router.get('/:id' , async(req, res)=>{
    try {
        const books = await Book.findById(req.params.id)
        //const books = await Book.find({_Id}).populate('user', ['username'])
        res.json({success: true, books})
    } catch (error) {
        console.log(error)
        res.status(500).json({success: false, message:'Server hoặc đường truyền lỗi'})
    }
})

//@route GET api/book 
//@desc Get all book
//@access Private
router.get('/all/allbook' , async(req, res)=>{
    try {
        const books = await Book.find({}).populate('chusach', ['username', 'email'])
        //const books = await Book.find({_Id}).populate('user', ['username'])
        res.json({success: true, books})
    } catch (error) {
        console.log(error)
        res.status(500).json({success: false, message:'Server hoặc đường truyền lỗi'})
    }
})
module.exports = router