import React, { Component, Fragment } from 'react';
import ReactDOM from 'react-dom';
import Success from '../alerts/SuccessAlert';
import Errors from '../alerts/ErrorAlert';

export default class Messages extends Component {
    constructor(props){
    	super(props);
        this.onChangeInput = this.onChangeInput.bind(this);
        this.onSubmit = this.onSubmit.bind(this);
        this.state = {
            name: '',
            email: '',
            message: '',
            alert_message: ''
        }
    }
    componentDidMount(){
    };

    onSubmit(event){
        event.preventDefault();
        const message = {
            name: this.state.name,
            email: this.state.email,
            message: this.state.message,
            alert_message: this.state.alert_message
        }

        axios.post('/mensajes/', message)
             .then(resp => {
                this.setState({alert_message: "success"});
                console.info(resp);
             }).catch(error => {
                this.setState({alert_message : "error"});
                console.info(error);
             });
    }

    onChangeInput(event){
        event.preventDefault();
        const target = event.target;
        const value = target.type === 'checkbox' ? target.checked : target.value;
        const name = target.name;
        //console.info(name, value);

        this.setState({
          [name]: value
        });
    }

    render() {    	    	
        return (
            <div>
                <div className="row">
                    <div className="col-8 col-12-small">
                        <form onSubmit={this.onSubmit}>
                            <div className="row gtr-uniform gtr-50">
                                <div className="col-6 col-12-xsmall">
                                    <input type="text"
                                        key='name'
                                        name='name'
                                        value={this.state.name}  
                                        onChange={this.onChangeInput}
                                        placeholder="Nombre" />
                                </div>
                                <div className="col-6 col-12-xsmall">
                                    <input type="email"
                                        key='email'
                                        name='email'
                                        value={this.state.email}  
                                        onChange={this.onChangeInput}
                                        placeholder="Correo" />
                                </div>
                                <div className="col-12">
                                    <textarea
                                        key='message'
                                        name='message'
                                        value={this.state.message}  
                                        onChange={this.onChangeInput}
                                        placeholder="Mensaje" >
                                    </textarea>
                                </div>
                            </div>
                            <input type="submit" value="Enviar Mensaje" />
                        </form>
                                
                    </div>
                    <div className="col-4 col-12-small">
                        <ul className="labeled-icons">
                            <li>
                                <h3 className="icon fa-home"><span className="label">Dirección</span></h3>
                                    1234 Algun Lugar<br />
                                    Medellín, TN 00000<br />
                                    Colombia
                            </li>
                            <li>
                                <h3 className="icon fa-mobile"><span className="label">Teléfono</span></h3>
                                    +57 350-485-3729
                            </li>
                            <li>
                                <h3 className="icon fa-envelope-o"><span className="label">Correo</span></h3>
                                unidosxmarianita@gmail.com
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('form')) {
    ReactDOM.render(<Messages />, document.getElementById('form'));
}
