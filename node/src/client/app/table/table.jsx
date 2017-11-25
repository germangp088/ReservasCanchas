import React from 'react';
import {render} from 'react-dom';
import Header from './header.jsx';
import Body from './body.jsx';

class Table extends React.Component {
		render() {
				return (
						<table className="table">
								<Header/>
								<Body canchas={this.props.canchas}/>
						</table>
				);
		}
}

export default Table;