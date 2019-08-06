<template>
    <b-row class="h-100">
        <b-col cols="8" class="h-100">
            <b-card title="Conversación Activa" class="h-100">
                
                <b-card class="my-2">
                    <b-media vertical-align="center">
                        <b-img slot="aside"
                            rounded="circle"
                            blank width="60" height="60"
                            blank-color="#777" alt="Person"    
                        ></b-img>

                        <p class="mb-0">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur, assumenda.
                        </p>
                    </b-media>
                </b-card>

                <b-card class="my-2">
                    <b-media right-align vertical-align="center">
                        <b-img slot="aside"
                            rounded="circle"
                            blank width="60" height="60"
                            blank-color="#777" alt="Person"    
                        ></b-img>

                        <p class="mb-0">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur, assumenda.
                        </p>
                    </b-media>
                </b-card>


                <!-- BTN ENVIAR MENSAJE -->
                <div slot="footer">
                    <b-form class="mb-0">
                        <b-input-group>
                            <b-form-input type="text" placeholder="Escribe tu mensaje..."></b-form-input>
                            <b-input-group-append>
                                <b-btn variant="primary">Enviar</b-btn>
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
        data(){
            return{

            }
        },
        mounted(){
            console.log('Component mounted');
            
        }
    }
</script>
