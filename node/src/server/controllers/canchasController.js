let q = require('q');
let fetch = require('node-fetch');
const { URL, URLSearchParams  } = require('url');
const url = require('url');
const canchaSchema = require("../schemas/canchaSchema.js");

let Canchas = {
	getCanchas: function (server, href) {
		console.log(server, href);
		const service = new URL(server.url+href);
		console.log(service.href);
		let deferred = q.defer();
		fetch(service.href)
			.then(function(res) {
				return res.json();
			}).then(function(json) {
				deferred.resolve(json);
			}).catch(function(err) {
				console.log(err);
				deferred.reject(err);
			});
		return deferred.promise;
	},

	saveCanchaBusqueda: function(cancha){
		console.log(cancha);
		let data = {
			"cancha": cancha
		};
		canchaSchema.create(data).then(function(cancha) {
			console.log(cancha)
		});
	}
}

module.exports = Canchas;