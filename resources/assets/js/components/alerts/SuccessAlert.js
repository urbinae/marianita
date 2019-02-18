import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class SuccessAlert extends Component {

    constructor(){
      super();

      this.state = {
        message:'Mensaje enviado con éxito'
      }
    }
    render() {
        return (
           <div>
              <div className="alert alert-success" role="alert">
                 {this.state.message}
              </div>
           </div>
           );
    }
}
