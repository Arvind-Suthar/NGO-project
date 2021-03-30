const express = require('express');
const Ideas = require('../models/ideas');
const MailIdeas = require('../models/mailIdeas');

const router = express.Router();


router.use(express.static(__dirname + '/public'));

router.get('/', async (req, res) => {
    const FetchedIdeas = await MailIdeas.find({status: "active"})
    .then(data => {
        res.render('sentMails', {"Ideas": data});
    }).catch(err => {
        console.log(err);
    })
});

router.get('/delete/:id/:ideaid', async (req, res) => {
    try {
        await MailIdeas.findByIdAndUpdate(req.params.id, {status: "deleted"});

        await Ideas.findByIdAndUpdate(req.params.ideaid, {status: "deleted", bgclass: "bg-danger"});

        const FetchedIdeas = await MailIdeas.find({status: "active"})
        .then(data => {
            if(data){
                res.render('sentMails', {"Ideas": data});
            }
        }).catch(err => {
            console.log(err);
        });
    } catch (error) {
        console.log(error);
    }
});


module.exports = router;