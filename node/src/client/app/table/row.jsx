import React from 'react';
import {render} from 'react-dom';

class Buscador extends React.Component {
		render() {
			let icon = "moon";
			let precio = this.props.cancha.Precio_Noche;
			if (this.props.cancha.Horario < 19) {
				icon = "sun";
				precio = this.props.cancha.Precio_Dia;
			}
				return (
						<tr>
								<td>{this.props.cancha.Nombre}</td>
								<td>{this.props.cancha.Tamanio}</td>
								<td>
									<div className="row">
										<div className="col-xs-12">
											<label>Latitud:&nbsp;</label>
											{this.props.cancha.Latitud}
											<label>/</label>
											<label>Longitud:&nbsp;</label>
											{this.props.cancha.Longitud}
										</div>
									</div>
								</td>
								<td>{this.props.cancha.Fecha}</td>
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
									<a href={this.props.cancha.Link} target="_blank">VER</a>
								</td>
						</tr>
				);
		}
}

export default Buscador;