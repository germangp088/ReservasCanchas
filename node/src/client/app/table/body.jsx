import React from 'react';
import {render} from 'react-dom';
import Row from './row.jsx';

class Buscador extends React.Component {
		render() {
				let rows = null;
				if (this.props.canchas.length > 0) {
						rows = this
								.props
								.canchas
								.map(function (cancha) {
										return <Row key={"Cancha" + cancha.id} cancha={cancha}/>
								});
				} else {
						rows = <tr>
								<td colSpan="3">No hay canchas para mostrar</td>
						</tr>
				}

				return (
						<tbody>
								{rows}
						</tbody>
				);
		}
}

export default Buscador;