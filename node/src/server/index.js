const express = require('express');
const app = express();
const bodyParser= require('body-parser');
const Canchas = require("./Canchas.js");
const q = require('q');
const path = require("path")
const config = require('config');
const baseFolder = path.resolve(__dirname, '../client/');

app.use(bodyParser.urlencoded());
app.use(bodyParser.json());
app.use("/",express.static(baseFolder));

app.get('/canchasSimultaneos', function(req, res){
	let promises = config.get('Canchas.serverUri').map((server)=>Canchas.getCanchas(server, req._parsedOriginalUrl.search));
	q.all(promises).then(
		function(data){
			let canchas = [];
			for (var index = 0; index < data.length; index++) {
				canchas = canchas.concat(data[index]);
			}
			console.log(canchas);
			res.json(canchas);
		})
		.catch(
			function(error){
				console.log(error);
				error.error = true;
        		res.json(error);
		});
});

app.listen(config.get('Canchas.host.port'), function(){
	
});