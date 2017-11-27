import React from 'react';
import {render} from 'react-dom';

class Buscador extends React.Component {
	constructor(props) {
		super(props);
        this.fixData = this.fixData.bind(this);
	}

	save(){
        const data = {
            "cancha" : JSON.stringify(this.props.cancha)
        };
        const values = fetch("/saveCanchaBusqueda",{
            "headers": {
                'Content-Type': 'application/json'
            },
            "method": "POST",
            "body": JSON.stringify(data)
        })
        .then((res) => res.json())
        .then((datos) => {
            console.log(datos)
        });
	}

	fixData(data){
        return data.toString().length == 1 ? "0" + data : data;
    }

	render() {
			let icon = "moon";
			let precio = this.props.cancha.Precio_Noche;
			if (this.props.cancha.Horario < 19) {
				icon = "sun";
				precio = this.props.cancha.Precio_Dia;
			}
			let fechaSplit = this.props.cancha.Fecha.split("-");
			let fecha = this.fixData(fechaSplit[2]) + "/" + this.fixData(fechaSplit[1]) +"/" + fechaSplit[0];
				return (
						<tr>
							<td>{this.props.cancha.Web}</td>
							<td>{this.props.cancha.Nombre}</td>
							<td>{this.props.cancha.Tamanio}</td>
							<td>
								<div className="row">
									<div className="col-xs-12">
										<label>Latitud:&nbsp;</label>
										{this.props.cancha.Latitud}
										<label>&nbsp;|&nbsp;</label>
										<label>Longitud:&nbsp;</label>
										{this.props.cancha.Longitud}
									</div>
								</div>
							</td>
							<td>{fecha}</td>
							<td>{this.props.cancha.Horario}</td>
							<td>
								<div className="row">
									<div className="col-xs-12">
										<i className={"fa fa-" + icon + "-o fa-lg"} aria-hidden="true"></i>
										${precio}
									</div>
								</div>
							</td>
							<td>
								<a onClick={() => this.save()} href={this.props.cancha.Link} target="_blank">VER</a>
							</td>
					</tr>
				);
		}
}

export default Buscador;