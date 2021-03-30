const express = require('express');

const router = express.Router();

const Ideas = require('../models/ideas');



router.use(express.static(__dirname + '/public'));

router.get('/', async (req, res) => {
    const FetchedIdeas = await Ideas.find({status: "awaiting"})
    .then(data => {
        res.render('approveMails', {"Ideas": data});
    }).catch(err => {
        console.log(err);
    })
});

router.get('/approve/:id', async (req, res) => {
    try {
        await Ideas.findByIdAndUpdate(req.params.id, {status: "active", bgclass: "bg-success"});

        const FetchedIdeas = await Ideas.find({status: "awaiting"})
        .then(data => {
            res.render('approveMails', {"Ideas": data});
        }).catch(err => {
            console.log(err);
        })
    } catch (error) {
        console.log(error);
    }
});

module.exports = router;