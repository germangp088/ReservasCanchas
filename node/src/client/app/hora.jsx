import React from 'react';
import {render} from 'react-dom';

export class hora extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {
        let options = [];
        for (let index = 0; index < 24; index++) {
            options.push(<option key={this.props.name + "_" + index} value={index}>{(index).toString()}</option>);
        }
        return (
                <div>  
                    <div className="row">
                        <div className="col-xs-12">
                            <label>{this.props.title}</label>
                        </div>
                    </div> 
                    <div className="row">
                        <div className="col-xs-12">
                            <select
                                className="form-control"
                                value={this.props.value}
                                onChange={this.props.onChange}>
                                {options}
                            </select>
                        </div>
                    </div>
                </div>
        )
    }
}
 
export default hora;