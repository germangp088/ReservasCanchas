var q = require('q');

var Canchas = {
	getCanchas: function () {
		var deferred = q.defer();
		setTimeout(function () {
			var canchas = [];
			canchas.push({
				id: 1,
				tipo: 5,
				descripcion: "Cancha 5",
				precio: "$250",
				link: "www.google.com"
			}, {
				id: 2,
				tipo: 11,
				descripcion: "Cancha 11",
				precio: "$500",
				link: "www.yahoo.com"
			});
			deferred.resolve(canchas);
		}, 2000);
		return deferred.promise;
	}
}

module.exports = Canchas;