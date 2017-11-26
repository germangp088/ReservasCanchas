import React from 'react';
import {render} from 'react-dom';

export class footer extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <footer className="footer">
				<div className="container">
					<span className="text-muted">German Dario, Rodrigo Vallaro.</span>
				</div>
			</footer>
        )
    }
}
 
export default footer;