import React from 'react';
import {render} from 'react-dom';

export class canchasBuscado extends React.Component {
    constructor(props) {
        super(props);
    }

    render() {

        let fechaSplit = this.props.cancha.Fecha.split("-");
        fechaSplit[2] = fechaSplit[2]
                .toString()
                .length == 1
                ? "0" + fechaSplit[2]
                : fechaSplit[2];
        fechaSplit[1] = fechaSplit[1]
                .toString()
                .length == 1
                ? "0" + fechaSplit[1]
                : fechaSplit[1];
        fechaSplit[2] + "/" + fechaSplit[1] + "/" + fechaSplit[0];

        let precio = this.props.cancha.Precio_Noche;
        if (this.props.cancha.Horario < 19) {
                precio = this.props.cancha.Precio_Dia;
        }
        return (
            <div className="row">
				<div className="col-xs-1">
                    <label>{this.props.cancha.Web}</label>
                </div>
                <div className="col-xs-2">
                    <label>{this.props.cancha.Nombre}</label>
                </div>
                <div className="col-xs-2">
                    <label>{this.props.cancha.Tamanio}</label>
                </div>
                <div className="col-xs-2">
                    <label>{this.props.cancha.Latitud}/{this.props.cancha.Longitud}</label>
                </div>
                <div className="col-xs-2">
                    <label>{fechaSplit[2] + "/" + fechaSplit[1] + "/" + fechaSplit[0]}</label>
                </div>
                <div className="col-xs-1">
                    <label>{this.props.cancha.Horario}</label>
                </div>
                <div className="col-xs-1">
                    <label>{precio}</label>
                </div>
                <div className="col-xs-1">
                    <a href={this.props.cancha.Link} target="_blank">VER</a>
                </div>
			</div>
        )
    }
}
 
export default canchasBuscado;
