import React from 'react';
import {render} from 'react-dom';
import DatePicker from './date.jsx';
import Hora from './hora.jsx';

class Buscador extends React.Component {
		constructor(props) {
				super(props);
				this.state = {
					cantidadCanchas: 0,
					init: true,
					loading: false,
					error: false,
					errorMessage: '',
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
				this.buildURL = this.buildURL.bind(this);
		}

		buildURL() {
			let url = '/canchasSimultaneos';
			url += '?tipoCancha=' + this.state.tipoCancha;
			url += this.state.fechaDesde != '' ? '&fechaDesde=' + this.state.fechaDesde : '';
			url += this.state.fechaHasta != '' ? '&fechaHasta=' + this.state.fechaHasta : '';
			url += this.state.horaDesde != '' ? '&horaDesde=' + this.state.horaDesde : '';
			url += this.state.horaHasta != '' ? '&horaHasta=' + this.state.horaHasta : '';

			return url;
		}

		find() {
				if(this.state.horaDesde != "" && this.state.horaHasta != ""){
					if(parseInt(this.state.horaDesde) > parseInt(this.state.horaHasta)){
						this.setState({loading: false, error: true, errorMessage: "La hora desde no puede ser mayor a la de hasta.", init: false});
						return;
					}
				}

				if(this.state.fechaDesde != "" && this.state.fechaHasta != ""){
					if(this.state.fechaDesde > this.state.fechaHasta){
						this.setState({loading: false, error: true, errorMessage: "La fecha desde no puede ser mayor a la de hasta.", init: false});
						return;
					}
				}

				let callBack = this.props.callBack;
				this.setState({loading: true});
				let me = this;
				fetch(this.buildURL()).then(function (response) {
						var contentType = response
								.headers
								.get("content-type");
						if (contentType && contentType.indexOf("application/json") !== -1) {
								response.json()
										.then(function (json) {
												if (json.error) {
													callBack([]);
													me.setState({loading: false, error: true,errorMessage: "Hubo un error en la consulta.", init: false});
												}
												else{
													callBack(json);
													me.setState({loading: false, error: false,errorMessage: "", init: false, cantidadCanchas: json.length});
												}
										}).catch(function (error) {
											me.setState({loading: false, error: true, errorMessage: error.message, init: false});
										});
								}
						})
						.catch(function (error) {
							me.setState({loading: false, error: true, errorMessage: error.message, init: false});
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
											 <input type="button" className="btn btn-primary" id="btnBuscar" value="Buscar" onClick={this.find}/>:
											 <input type="button" className="btn" id="btnBuscar" value="Cargando..." />
			let mensage = this.state.error ?
											<div className="alert alert-danger">
												<strong>Atención!</strong> {this.state.errorMessage}
											</div>:
											this.state.cantidadCanchas > 0 ?
											<div className="alert alert-success">
												<strong>Busqueda realizada!</strong> se encontraron <strong>{this.state.cantidadCanchas}</strong> canchas.
										   </div>:
										   !this.state.init ?
											<div className="alert alert-warning">
												No se encontraron canchas.
											</div>:null;

				return (
					<form>
						<div className="form-group">
							<div className="row">
								<div className="col-xs-12">
									<h5>Completa el formulario para filtrar las canchas.</h5>
								</div>
							</div>
							<div className="row">
								<div className="col-xs-12">
									{mensage}
								</div>
							</div>
							<div className="row">
								<div className="col-xs-2">
									<div className="row">
										<div className="col-xs-12">
											<label>Tipo de cancha:</label>
										</div>
									</div>
									<div className="row">
										<div className="col-xs-12">
											<select 
												className="form-control"
												value={this.state.tipoCancha}
												onChange={this.changeTipoCancha}>
												<option value="5">Cancha 5</option>
												<option value="7">Cancha 7</option>
												<option value="9">Cancha 9</option>
											</select>
										</div>
									</div>
								</div>
								<div className="col-xs-4">
									<div className="row">
										<div className="col-xs-6">
											<DatePicker 
												title="Fecha Desde:"
												key="fecha_reserva_desde"
												name="fecha_reserva_desde"
												value={this.state.fechaDesde}
												onChange={this.changeFechaDesde}/>
										</div>
										<div className="col-xs-6">
											<DatePicker 
												title="Fecha Hasta:" 
												key="fecha_reserva_hasta"
												name="fecha_reserva_hasta"
												value={this.state.fechaHasta}
												onChange={this.changeFechaHasta}/>
										</div>
									</div>
								</div>
								<div className="col-xs-3">
									<div className="row">
										<div className="col-xs-6">
											<Hora 
											title="Hora Desde:" 
											key="hora_reserva_desde"
											name="hora_reserva_desde"
											value={this.state.horaDesde}
											onChange={this.changeHoraDesde}/>
										</div>
										<div className="col-xs-6">
											<Hora 
											title="Hora Hasta:" 
											key="hora_reserva_hasta"
											name="hora_reserva_hasta"
											value={this.state.horaHasta}
											onChange={this.changeHoraHasta}/>
										</div>
									</div>
								</div>
								<div className="col-xs-3">
									<div className="row">
										<div className="col-xs-12">
											&nbsp;
										</div>
									</div>
									<div className="row">
										<div className="col-xs-12">
											{button}
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				);
		}
}

export default Buscador;