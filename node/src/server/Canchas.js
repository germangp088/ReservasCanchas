var q = require('q');
var fetch = require('node-fetch');

var Canchas = {
	getCanchas: function (server) {
		var deferred = q.defer();
		fetch(server)
			.then(function(res) {
				return res.json();
			}).then(function(json) {
				deferred.resolve(json);
			}).catch(function(err) {
				console.log(err);
			});
		return deferred.promise;
	}
}

module.exports = Canchas;