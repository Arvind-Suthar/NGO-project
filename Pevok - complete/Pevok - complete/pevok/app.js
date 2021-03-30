const express = require('express');
const mongoose = require('mongoose');
const Ideas = require('./models/ideas');
const Mails = require('./models/mailIdeas');
const bodyParser = require('body-parser');
require('dotenv/config');
const app = express();


mongoose.set('useFindAndModify', false);

//Import approveMails routes
const approveRoutes = require('./routes/approveMails');
app.use('/approveMails', approveRoutes);


//Import SentMails routes
const sentRoutes = require('./routes/sentMails');
app.use('/sentMails', sentRoutes);


//Import Current Plan routes
const currentPlanRoutes = require('./routes/currentPlan');
app.use('/currentPlan', currentPlanRoutes);




//database connection
mongoose.connect(process.env.DB_CONNECTION, { useNewUrlParser: true, useUnifiedTopology: true }, () => {
    console.log("Connection succes!");
});





//All the middleware functions
app.use(bodyParser.urlencoded({
    extended: true
  }));
app.use(bodyParser.json());
app.use(express.static(__dirname + '/public'));




//setting EJS as the template engine
app.set('view engine', 'ejs');





//basic routing to pages
app.get('/dashboard', (req, res) => {
    res.render('main');
});
app.get('/addidea', (req, res) => {
    res.render('addIdea', {sendSuccess: "noFormSubmission"});
});
app.get('/allIdea', async (req, res) => {
    const FetchedIdeas = await Ideas.find({})
    .then(data => {
        res.render('allIdea', {"AllIdeas": data});
    }).catch(err => {
        console.log(err);
    })
});




//Handling post request from forms
app.post('/addidea', async (req, res) => {

    const newIdea = new Ideas({
        product: req.body.product,
        subject: req.body.subject,
        description: req.body.description
    });

    const savedIdea = await newIdea.save()
    .then(data => {
        res.render('addIdea', {sendSuccess: true});
        //console.log(res.json(data));
    })
    .catch(err => {
        console.log(err);
    });
});




//starting app on port 3000
app.listen(3000);
