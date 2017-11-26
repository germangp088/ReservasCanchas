import React from 'react';
import {render} from 'react-dom';

export class navBar extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <nav className="navbar navbar-default">
				<div className="container-fluid">
					<div className="navbar-header">
						<a className="navbar-brand" href="#">Futbol Ya!</a>
					</div>
					<ul className="nav navbar-nav">
						<li className="active"><a href="#">Inicio</a></li>
					</ul>
				</div>
			</nav>
        )
    }
}
 
export default navBar;