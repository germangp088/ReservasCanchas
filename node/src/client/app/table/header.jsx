import React from 'react';
import {render} from 'react-dom';

class Buscador extends React.Component {
		render() {
				return (
						<thead>
								<tr>
										<th>Cancha</th>
										<th>Precio Día</th>
										<th>Precio Noche</th>
										<th>Link</th>
								</tr>
						</thead>
				);
		}
}

export default Buscador;