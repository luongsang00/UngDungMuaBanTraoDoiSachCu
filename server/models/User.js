const mongoose = require('mongoose');
const Schema = mongoose.Schema

const UserSchema = new Schema({
    username:{
        type: String,
        required: true,
        unique: true
    },
    password:{
        type: String,
        require: true
    },
    email:{
        type: String,
        required: true,

    },
    createdAt:{
        type: Date,
        default: Date.now
    },
    ngaysinh:{
        type: String
    },
    gioitinh:{
        type: String,
        enum: ['Nam', 'Nu', 'Khac']
    },
    diachi:{
        type: String
    },
    anh:{
        type: String,
        default:""
    }


    
})
module.exports = mongoose.model('user', UserSchema)