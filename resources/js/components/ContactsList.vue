<template>  
    <div>
        <b-form>
            <b-form-group>
                <b-form-input class="text-center"
                    type="text"
                    placeholder="Buscar Contacto"
                ></b-form-input>
            </b-form-group>
        </b-form>

        <b-list-group>
                <contact-component 
                    v-for="conversation in conversations"
                    :key="conversation.id"
                    :conversation="conversation"
                ></contact-component>
            <!-- <contact-component variant="primary"></contact-component>
            <contact-component></contact-component>
            <contact-component variant="secondary"></contact-component> -->
        </b-list-group>
    </div>
</template>
<script>
export default {
        data(){
            return {
                conversations: [],
            }
        },
        mounted(){
            this.getConversations()            
        },
        methods: {
            getConversations(){
                axios.get('/api/conversations').then((response) => {
                    this.conversations = response.data;
                });
            }
        }
    }
</script>
