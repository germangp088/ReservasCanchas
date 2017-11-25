import React from 'react';
import {render} from 'react-dom';
import DatePicker from './date.jsx';
import Hora from './hora.jsx';

class Buscador extends React.Component {
		constructor(props) {
				super(props);
				this.state = {
					loading: false,		
					tipoCancha: '5',
					fechaDesde: '',
					fechaHasta: '',
					horaDesde: '',
					horaHasta: ''
				};
				this.find = this.find.bind(this);
				this.changeHoraDesde = this.changeHoraDesde.bind(this);
				this.changeHoraHasta = this.changeHoraHasta.bind(this);
				this.changeFechaDesde = this.changeFechaDesde.bind(this);
				this.changeFechaHasta = this.changeFechaHasta.bind(this);
				this.changeTipoCancha = this.changeTipoCancha.bind(this);
		}

		find() {
			
				let callBack = this.props.callBack;
				this.setState({loading: true});
				let me = this;
				fetch('/canchasSimultaneos').then(function (response) {
						var contentType = response
								.headers
								.get("content-type");
						if (contentType && contentType.indexOf("application/json") !== -1) {
								response
										.json()
										.then(function (json) {
												callBack(json.canchas[0]);
												me.setState({loading: false});
										});
								}
						})
						.catch(function (error) {
								console.log('Error: ' + error.message);
						});
		}

		changeTipoCancha(event) {
			this.setState({ tipoCancha: event.target.value });
		}
	
		changeHoraDesde(event) {
			this.setState({ horaDesde: event.target.value });
		}
	
		changeHoraHasta(event) {
			this.setState({ horaHasta: event.target.value });
		}
	
		changeFechaDesde(event) {
			this.setState({ fechaDesde: event.target.value });
		}
	
		changeFechaHasta(event) {
			this.setState({ fechaHasta: event.target.value });
		}

		render() {
			let button = !this.state.loading ?
											 <input type="button" id="btnBuscar" value="Buscar" onClick={this.find}/>:
											 <input type="button" id="btnBuscar" value="Cargando..." />

				return (
						<div>
							<div className="row">
								<div className="col-xs-12">
									<h5>Completa el formulario para filtrar las canchas.</h5>
								</div>
							</div>
							<div className="row">
								<div className="col-xs-2">
									<label>Tipo de cancha:</label>
								</div>
								<div className="col-xs-10">
									<select 
										value={this.state.tipoCancha}
										onChange={this.changeTipoCancha}>
										<option value="5">Cancha 5</option>
										<option value="7">Cancha 7</option>
										<option value="9">Cancha 9</option>
									</select>
								</div>
							</div>
							<DatePicker 
								title="Fecha Desde:"
								key="fecha_reserva_desde"
								name="fecha_reserva_desde"
								value={this.state.fechaDesde}
								onChange={this.changeFechaDesde}/>
							<DatePicker 
								title="Fecha Hasta:" 
								key="fecha_reserva_hasta"
								name="fecha_reserva_hasta"
								value={this.state.fechaHasta}
								onChange={this.changeFechaHasta}/>
							<Hora 
								title="Hora Desde:" 
								key="hora_reserva_desde"
								name="hora_reserva_desde"
								value={this.state.horaDesde}
								onChange={this.changeHoraDesde}/>
							<Hora 
								title="Hora Hasta:" 
								key="hora_reserva_hasta"
								name="hora_reserva_hasta"
								value={this.state.horaHasta}
								onChange={this.changeHoraHasta}/>
							<div className="row">
								<div className="col-xs-12">
									{button}
								</div>
							</div>
						</div>
				);
		}
}

export default Buscador;