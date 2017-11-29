import React from 'react';
import {render} from 'react-dom';
import CanchasBuscado from './canchasBuscado.jsx';

export class ultimosBuscados extends React.Component {
    constructor(props) {
        super(props);
        this.state={
            top5: []
        };
    }

    componentDidMount() {
        const values = fetch("/getUltimas", { "method": "GET" }).then((res) => res.json()).then((datos) => {
			this.setState({ top5:  datos});
		});
    }

    render() {
        let nodos = this.state.top5.map(function(item, index){
            let cancha = JSON.parse(item.cancha);
            return <CanchasBuscado key={"UB_"+index} cancha={cancha} />;
         });
        return (
            <div className="fondo pad">
				<h2>Últimos Buscados</h2>
                <div className="row">
                    <div className="col-xs-1">
                        <label>Web:</label>
                    </div>
                    <div className="col-xs-2">
                        <label>Nombre:</label>
                    </div>
                    <div className="col-xs-2">
                        <label>Tipo:</label>
                    </div>
                    <div className="col-xs-2">
                        <label>Coordenadas:</label>
                    </div>
                    <div className="col-xs-2">
                        <label>Fecha:</label>
                    </div>
                    <div className="col-xs-1">
                        <label>Hora:</label>
                    </div>
                    <div className="col-xs-1">
                        <label>Precio:</label>
                    </div>
                    <div className="col-xs-1">
                        <label>Link</label>
                    </div>
                </div>
                {nodos}
			</div>
        )
    }
}

export default ultimosBuscados;