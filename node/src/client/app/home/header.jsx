import React from 'react';
import {render} from 'react-dom';

export class header extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        return (
            <div className="page-header">
				<img src="../public/img/banner.jpg" style={{width: "100%"}} alt="Banner" />
			</div>
        )
    }
}
 
export default header;