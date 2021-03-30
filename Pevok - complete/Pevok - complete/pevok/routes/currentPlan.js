const express = require('express');

const router = express.Router();

router.use(express.static(__dirname + '/public'));

router.get('/', (req,res) => {
    res.render('currentPlan');
});


module.exports = router;