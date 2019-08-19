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
                    @click.native="selectConversation(conversation)"
                ></contact-component>
        </b-list-group>
    </div>
</template>
<script>
export default {
        props: {
            conversations: Array
        },
        data(){
            return {
            }
        },
        mounted(){
            // this.getConversations()            
        },
        methods: {
            selectConversation(conversation){
                this.$emit('conversationSelected', conversation); // Evento que se emite
                
            }
        }
    }
</script>
