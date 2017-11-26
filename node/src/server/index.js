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

app.get('/canchasSimultaneos/:tipoCancha/:fechaDesde/:fechaHasta/:horaDesde/:horaHasta', function(req, res){
	var promesas = [];
	promesas.push(config.get('Canchas.serverUri').map(Canchas.getCanchas));
	
	q.all(promesas).then(
		function(canchas){
			var data = {
				canchas: canchas
			}
			res.send(data);
		})
		.catch(
			function(error){
				res.send(error);
		});
});

app.listen(config.get('Canchas.host.port'), function(){
	
});