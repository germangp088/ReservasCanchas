import React from 'react';
import {render} from 'react-dom';

class Buscador extends React.Component {
		render() {
				return (
						<tr>
								<td>{this.props.cancha.descripcion}</td>
								<td>{this.props.cancha.precio}</td>
								<td>
										<a href={this.props.cancha.link}>VER</a>
								</td>
						</tr>
				);
		}
}

export default Buscador;