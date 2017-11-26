import React from 'react';
import {render} from 'react-dom';

class Buscador extends React.Component {
		render() {
				return (
						<tr>
								<td>{this.props.cancha.Nombre}</td>
								<td>{this.props.cancha.Precio_Dia}</td>
								<td>{this.props.cancha.Precio_Noche}</td>
								<td>
									<a href={this.props.cancha.Link}>VER</a>
								</td>
						</tr>
				);
		}
}

export default Buscador;