const mongoose = require('mongoose');
const Schema = mongoose.Schema

const GioHangSchema =new Schema({
    tensach:{
        type: String
    },
    tonggia:{
        type: Number
    },
    soluong: {
        type: Number
    }
})

module.exports = mongoose.model('giohang', GioHangSchema)