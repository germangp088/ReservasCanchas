import React from 'react';
import {render} from 'react-dom';

export class footer extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <footer className="footer">
				<div className="container fondo footer">
					<label >German Dario, Rodrigo Vallaro.</label>
				</div>
			</footer>
        )
    }
}
 
export default footer;