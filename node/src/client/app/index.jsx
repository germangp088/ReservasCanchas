import React from 'react';
import {render} from 'react-dom';
import Buscador from './buscador.jsx';
import Table from './table/table.jsx';

class App extends React.Component {
		constructor(props) {
				super(props);
				this.state = {
						canchas: []
				};
				this.setCanchas = this.setCanchas.bind(this);
		}

		setCanchas(canchas) {
				this.setState({canchas: canchas});
		}

		render() {
				return (
						<div>
								<h1>Buscar</h1>
								<Buscador callBack={this.setCanchas}/>
								<Table canchas={this.state.canchas}/>
						</div>
				);
		}
}

render(<App />, document.getElementById('app'));