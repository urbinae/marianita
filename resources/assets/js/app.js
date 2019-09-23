new Vue({
    data: {
        name: '',
        email: '',
        message: '',
        alert_message: '',
        flag: false,
        clase: '',
        id: ''
    },
    methods: {
        onSubmit(event) {
            event.preventDefault();

            const message = {
                name: this.name,
                email: this.email,
                message: this.message,
            }
            console.log(message);
            axios.post('/mensajes/', message)
                .then(resp => {
                    console.info(resp);
                    this.alert_message = "Exito! Su mensaje fué enviado";
                    this.flag = true;
                    this.clase = 'alert alert-success';
                    this.id = 'success-alert'
                    $("#"+this.id).fadeTo(2000, 500).slideUp(500, function () {
                        $("#"+this.id).alert('close');
                    });
                    this.name='';
                    this.email='';
                    this.message='';
                }).catch(error => {
                    this.alert_message = "Error! Su mensaje no fué enviado";
                    this.flag = true;
                    this.clase = 'alert alert-danger';
                    this.id = 'danger-alert'
                    console.log(error);
                    $("#"+this.id).fadeTo(2000, 500).slideUp(500, function () {
                        $("#"+this.id).alert('close');
                    });
                });
            
        }
    },

    template: `
    <div>
        <div v-if="flag" :class="clase" :id="id" role="alert">
            <strong>{{alert_message}}! </strong>
        </div>
                <div class="row gtr-uniform gtr-50">
                    <div class="col-6 col-12-xsmall">
                        <input type="text"
                            name='name'
                            v-model="name"
                            placeholder="Nombre" />
                    </div>
                    <div class="col-6 col-12-xsmall">
                        <input type="email"
                            name='email'
                            v-model=email
                            placeholder="Correo" />
                    </div>
                    <div class="col-12">
                        <textarea
                            key='message'
                            name='message'
                            v-model=message
                            placeholder="Mensaje" >
                        </textarea>
                    </div>
                </div>
                <input type="submit" class="" value="Enviar Mensaje" @click="onSubmit" />
        </div>
    </div>
`,
}).$mount('#form');
