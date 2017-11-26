import React from 'react';
import {render} from 'react-dom';

class Buscador extends React.Component {
		render() {
				return (
						<thead>
								<tr>
									<th className="text-center">
										<label>Web&nbsp;</label>
										<i className="fa fa-internet-explorer fa-lg" aria-hidden="true"></i>
									</th>
									<th className="text-center">
										<label>Nombre&nbsp;</label>
										<i className="fa fa-futbol-o fa-lg" aria-hidden="true"></i>
									</th>
									<th className="text-center">
										<label>Tipo&nbsp;</label>
										<i className="fa fa-futbol-o fa-lg" aria-hidden="true"></i>
									</th>
									<th className="text-center">
										<label>Coordenadas&nbsp;</label>
										<i className="fa fa-compass fa-lg" aria-hidden="true"></i>
									</th>
									<th className="text-center">
										<label>&nbsp;</label>
										<i className="fa fa-calendar fa-lg" aria-hidden="true"></i>
									</th>
									<th className="text-center">
										<label>&nbsp;</label>
										<i className="fa fa-clock-o fa-lg" aria-hidden="true"></i>
									</th>
									<th className="text-center">
										<div className="row">
											<div className="col-xs-12">
												<label>Precios:&nbsp;</label>
												<i className="fa fa-sun-o fa-lg" aria-hidden="true"></i>
												<label>/</label>
												<i className="fa fa-moon-o fa-lg" aria-hidden="true"></i>
											</div>
										</div>
									</th>
									<th className="text-center">
										<label>&nbsp;</label>
										<i className="fa fa-external-link-square fa-lg" aria-hidden="true"></i>
									</th>
							</tr>
					</thead>
				);
		}
}

export default Buscador;