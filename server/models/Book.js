const mongoose = require('mongoose');
const Schema = mongoose.Schema

const PostSchema =new Schema({
    tensach:{
        type: String,
        required: true
    },
    tacgia:{
        type : String
    },
    soluong: {
        type: Number
    },
    chusach: {
        type: Schema.Types.ObjectId,
        ref: 'user'
    },
    gia:{
        type: Number
    },
    mota:{
        type: String
    }
})

module.exports = mongoose.model('books', PostSchema)