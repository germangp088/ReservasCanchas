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
				}

				return (
						<tbody>
							{rows}
						</tbody>
				);
		}
}

export default Buscador;