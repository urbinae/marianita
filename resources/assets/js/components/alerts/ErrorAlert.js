import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class ErrorAlert extends Component {

    constructor(){
      super();

      this.state = {
        message:'Error al enviar mensaje'
      }
    }
    render() {
        return (
           <div>
              <div className="alert alert-danger" role="alert">
                 {this.state.message}
              </div>
           </div>
           );
    }
}