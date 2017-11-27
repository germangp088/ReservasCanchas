const express = require('express');
const app = express();
const bodyParser= require('body-parser');
const path = require("path")
const baseFolder = path.resolve(__dirname, '../client/');
const mongoose = require('mongoose');
const config = require('config');

app.use(bodyParser.urlencoded());
app.use(bodyParser.json());
app.use("/",express.static(baseFolder));

mongoose.connect('mongodb://localhost/FutbolYa', { useMongoClient: true })

mongoose.Promise = global.Promise;

require('./routes/canchasRoute')(app);

app.listen(config.get('Canchas.host.port'), function(){
	
});