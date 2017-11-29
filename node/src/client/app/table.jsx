import React from 'react';
import {render} from 'react-dom';
import {BootstrapTable, TableHeaderColumn, SearchField } from 'react-bootstrap-table';

class Table extends React.Component {
		constructor(props) {
				super(props);
		}

		onToggleDropDown(toggleDropDown) {
				toggleDropDown();
		}

		renderSizePerPageDropDown(props) {
				return (<SizePerPageDropDown
						className='my-size-per-page'
						btnContextual='btn-warning'
						variation='dropup'
						//onClick={() => this.onToggleDropDown(props.toggleDropDown)}
						/>);
		}

		linkFormatter(cell, row) {
				return <a
						onClick={() => {
						const data = {
								"cancha": JSON.stringify(row)
						};
						const values = fetch("/saveCanchaBusqueda", {
								"headers": {
										'Content-Type': 'application/json'
								},
								"method": "POST",
								"body": JSON.stringify(data)
						}).then((res) => res.json()).then((datos) => {
								console.log(datos)
						});
				}}
						href={cell}
						target="_blank">VER</a>;
		}

		dateFormatter(cell, row) {
				let fechaSplit = cell.split("-");
				fechaSplit[2] = fechaSplit[2]
						.toString()
						.length == 1
						? "0" + fechaSplit[2]
						: fechaSplit[2];
				fechaSplit[1] = fechaSplit[1]
						.toString()
						.length == 1
						? "0" + fechaSplit[1]
						: fechaSplit[1];
				return fechaSplit[2] + "/" + fechaSplit[1] + "/" + fechaSplit[0];
		}

		priceFormatter(cell, row) {
				let icon = "moon";
				let precio = row.Precio_Noche;
				if (row.Horario < 19) {
						icon = "sun";
						precio = row.Precio_Dia;
				}
				return '<i class="fa fa-' + icon + '-o fa-lg" aria-hidden="true"></i> $' + precio;
		}
		coordenadasFormatter(cell, row) {

				return <div>
						<label>Latitud:&nbsp;</label>{row.Latitud}
						<label>&nbsp;|&nbsp;</label>
						<label>Longitud:&nbsp;</label>{row.Longitud}</div>;
		}

		renderPaginationShowsTotal(start, to, total) {
			return (
				<div className="alert alert-success">
					De { start } a { to }, total { total }
				</div>
			);
		}

		render() {
				const options = {
						sizePerPageDropDown: this.renderSizePerPageDropDown,
						noDataText: 'No hay resultados.',
						sizePerPageList: [ 10 ,5 ],
						paginationShowsTotal: this.renderPaginationShowsTotal,
						withFirstAndLast: true,
						paginationPosition: 'top'
				};

				return (
						<BootstrapTable data={this.props.canchas} options={options}
						striped={true} pagination containerClass='fondo pad'
						headerStyle={ { background: '#afb064' } }
						search searchPlaceholder='Nombre...'>
								<TableHeaderColumn dataAlign='center' dataField='Web' width="10%">
										<label>Web&nbsp;<i className="fa fa-internet-explorer fa-lg" aria-hidden="true"></i></label>
								</TableHeaderColumn>
								<TableHeaderColumn dataAlign='center' dataField='Nombre' width="15%">
										<label>Nombre&nbsp;<i className="fa fa-futbol-o fa-lg" aria-hidden="true"></i></label>
								</TableHeaderColumn>
								<TableHeaderColumn dataAlign='center' dataField='Tamanio' dataSort={true} width="10%">
										<label>Tipo&nbsp;<i className="fa fa-futbol-o fa-lg" aria-hidden="true"></i></label>
								</TableHeaderColumn>
								<TableHeaderColumn dataAlign='center' dataField='Latitud' dataFormat={this.coordenadasFormatter} width="25%">
										<label>Coordenadas&nbsp;<i className="fa fa-compass fa-lg" aria-hidden="true"></i></label>
								</TableHeaderColumn>
								<TableHeaderColumn dataAlign='center' dataField='Fecha' dataFormat={this.dateFormatter} dataSort={true} width="10%">
								<label><i className="fa fa-calendar fa-lg" aria-hidden="true"></i></label>
								</TableHeaderColumn>
								<TableHeaderColumn dataAlign='center' dataField='Horario' dataSort={true} width="10%">
								<label><i className="fa fa-clock-o fa-lg" aria-hidden="true"></i></label>
								</TableHeaderColumn>
								<TableHeaderColumn dataAlign='center' dataField='Precio_Noche' dataFormat={this.priceFormatter} width="20%">
										<label>Precios:&nbsp;
										<i className="fa fa-sun-o fa-lg" aria-hidden="true"></i>
										/<i className="fa fa-moon-o fa-lg" aria-hidden="true"></i>
										</label>
								</TableHeaderColumn>
								<TableHeaderColumn dataAlign='center'
										dataField='Link'
										dataFormat={this.linkFormatter}
										isKey={true} width="5%">
										<label><i className="fa fa-external-link-square fa-lg" aria-hidden="true"></i></label>
								</TableHeaderColumn>
						</BootstrapTable>
				);
		}
}

export default Table;