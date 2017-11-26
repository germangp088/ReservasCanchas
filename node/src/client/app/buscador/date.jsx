import React from 'react';
import {render} from 'react-dom';

export class date extends React.Component {
    constructor(props) {
        super(props);
        this.parseDate = this.parseDate.bind(this);
        this.fixData = this.fixData.bind(this);
    }

    parseDate(date){
        return date.getFullYear() + "-"+ this.fixData(date.getMonth() + 1)  + "-"  + this.fixData(date.getDate());
    }

    fixData(data){
        return data.toString().length == 1 ? "0" + data : data;
    }

    render() { 
        let date = new Date();
        let today = this.parseDate(date);
        date.setDate(date.getDate() + 7);
        let maxDate = this.parseDate(date);
        return (
                <div>
                    <div className="row">
                        <div className="col-xs-12">
                            <label>{this.props.title}</label>
                        </div>
                    </div>
                    <div className="row">
                        <div className="col-xs-12">
                            <input type="date" 
                                className="form-control"
                                name={this.props.name}
                                min={today}
                                max={maxDate}
                                value={this.props.value}
                                onChange={this.props.onChange} />
                        </div>
                    </div>
                </div>
        )
    }
}
 
export default date;