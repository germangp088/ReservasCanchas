var q = require('q');
var fetch = require('node-fetch');
const { URL, URLSearchParams  } = require('url');
const url = require('url');

var Canchas = {
	getCanchas: function (server, href) {
		console.log(server, href);
		const service = new URL(server.url+href);
		console.log(service.href);
		var deferred = q.defer();
		fetch(service.href)
			.then(function(res) {
				return res.json();
			}).then(function(json) {
				console.log(json);
				deferred.resolve(json);
			}).catch(function(err) {
				console.log(err);
				deferred.reject(err);
			});
		return deferred.promise;
	}
}

module.exports = Canchas;