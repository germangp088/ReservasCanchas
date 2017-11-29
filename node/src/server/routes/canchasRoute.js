const canchasController = require("../controllers/canchasController.js");
const config = require('config');
const q = require('q');

module.exports = function(app) {
	app.get('/canchasSimultaneos', function(req, res){
		let promises = config.get('Canchas.serverUri').map((server)=>canchasController.getCanchas(server, req._parsedOriginalUrl.search));
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

	app.post('/saveCanchaBusqueda', function(req, res){
		console.log("body",req.body.cancha);
		canchasController.saveCanchaBusqueda(req.body.cancha);
	});

	app.get('/getUltimas', function(req, res, next) {
		canchasController.getUltimas(res);
	});
}
