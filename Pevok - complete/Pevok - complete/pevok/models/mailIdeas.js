const mongoose = require('mongoose');


const mailSchema = mongoose.Schema({
    mailHeader: {
        type: String,
        required: true
    },
    mailBody: {
        type: String,
        required: true
    },
    recipients: {
        type: Number,
        default: 0,
    },
    status: {
        type: String,
        default: "active"
    },
    mailIdea: {
        type: String,
        required: true
    }
});

module.exports = mongoose.model('Mails', mailSchema);