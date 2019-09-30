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
            axios.get('/mensajes/', {
                params: {
                    name: this.name,
                    email: this.email,
                    message: this.message,
                  }
            })
                .then(resp => {
                    console.info(resp);
                    this.alert_message = "Exito! Su mensaje fué enviado";
                    this.flag = true;
                    this.clase = 'alert alert-success';
                    this.id = 'success-alert';
                   
                    this.name='';
                    this.email='';
                    this.message='';
                }).catch(error => {
                    this.alert_message = "Error! Su mensaje no fué enviado";
                    this.flag = true;
                    this.clase = 'alert alert-danger';
                    this.id = 'danger-alert'
                    console.log(error);
                    
                });
            
        }
    },

    template: `
    <div>
        <div v-if="flag" :class="clase" :id="id" role="alert">
            <strong>{{alert_message}}! </strong>
        </div>
            <form method = "post" name="addpost" id="addpost" action="#" enctype="multipart/form-data" @submit.prevent="onSubmit">
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
                <button class="btn btn-success">Enviar Mensaje</button>
            </form>
    </div>
`,
}).$mount('#form');
