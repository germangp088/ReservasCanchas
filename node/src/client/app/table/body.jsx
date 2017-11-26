import React from 'react';
import {render} from 'react-dom';
import Row from './row.jsx';

class Buscador extends React.Component {
		render() {
				let rows = null;
				if (this.props.canchas.length > 0) {
						rows = this.props.canchas.map(function (cancha, index) {
										return <Row key={"Cancha_" + index} cancha={cancha}/>
								});
				} else {
						rows = <tr>
								<td colSpan="7">
									<div class="alert alert-warning">
										No se encontraron canchas.
									</div>
								</td>
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