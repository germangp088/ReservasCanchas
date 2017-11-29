import React from 'react';
import {render} from 'react-dom';
import Buscador from './buscador/buscador.jsx';
import Table from './table.jsx';
import NavBar from './home/navBar.jsx';
import Header from './home/header.jsx';
import Footer from './home/footer.jsx';

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
						<div className="container">
							<NavBar />
							<Header />
							<Buscador callBack={this.setCanchas}/>
							<hr />
							<Table canchas={this.state.canchas}/>
							<Footer />
						</div>
				);
		}
}

render(<App />, document.getElementById('app'));