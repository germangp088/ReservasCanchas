import React from 'react';
import {render} from 'react-dom';

export class hora extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        let options = [];
        for (let index = 1; index < 13; index++) {
            options.push(<option value={index}>{(index + 11).toString()}</option>);
        }
        return (  
                <div className="row">
                    <div className="col-xs-2">
                        <label>{this.props.title}</label>
                    </div>
                    <div className="col-xs-10">
                        <select 
                            value={this.props.value}
                            onChange={this.props.onChange}>
                            {options}
                        </select>
                    </div>
                </div>
        )
    }
}
 
export default hora;