const mongoose = require('mongoose');

//get Today's Date to store in DB
let today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
today = dd + '/' + mm + '/' + yyyy;


const IdeasSchema = mongoose.Schema({
    product: {
        type: String,
        required: true
    },
    subject: {
        type: String,
        required: true
    },
    priority: {
        type: String,
        default: "medium"
    },
    description: {
        type: String,
        required: true
    },
    ideaDate: {
        type: String,
        default: today
    },
    status: {
        type: String,
        default: "pending"
    },
    bgclass: {
        type: String,
        default: "bg-warning"
    }
});

module.exports = mongoose.model('Ideas', IdeasSchema);