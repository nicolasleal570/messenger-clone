<template>
    <b-row class="h-100">
        <b-col cols="8" class="h-100">
            <b-card title="Conversación Activa" class="h-100">

                <message-conversation-component 
                    v-for="message in messages"
                    :key="message.id"
                    :written-by-me="message.written_by_me"
                >
                    {{ message.content }}
                </message-conversation-component>

                <!-- BTN ENVIAR MENSAJE -->
                <div slot="footer">
                    <b-form @submit.prevent="postMessage" class="mb-0">
                        <b-input-group>
                            <b-form-input autocomplete="off" type="text" v-model="newMessage" placeholder="Escribe tu mensaje..."></b-form-input>
                            <b-input-group-append>
                                <b-btn type="submit" variant="primary">Enviar</b-btn>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form>
                </div>
            </b-card>
        </b-col>

        <b-col cols="4">
            <b-img rounded="circle"
            blank width="60" height="60"
            blank-color="#777" alt="Person"    
            ></b-img>
            <p>Usuario seleccionado</p>
            <hr>
            <b-form-checkbox>Desactivar notificaciones</b-form-checkbox>
        </b-col>
    </b-row>
</template>
<script>
    export default {
        props: {
            contactId : Number,
        },
        data(){
            return{
                messages: [],
                newMessage: '',

            }
        },
        mounted(){
            this.getMessages()
        },
        methods: {
            getMessages(){
                // Obteniendo los mensajes
                axios.get(`/api/messages?contact_id=${this.contactId}`)
                    .then((response) => {
                        this.messages = response.data;
                    });
            },
            postMessage(){
                const params = {
                    to_id: 2,
                    content: this.newMessage,
                }
                axios.post('/api/messages', params)
                    .then((response) => {
                        // console.log(response.data);
                        if (response.data) {
                            this.newMessage = '';
                            this.getMessages();
                        }
                    });
            }
        },
        watch: {
            contactId(value) { // Actualiza los mensajes segun el contacto
                this.getMessages();
            }
        }
    }
</script>
