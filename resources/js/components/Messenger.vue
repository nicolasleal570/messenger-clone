<template>
    <b-container fluid style="height: calc(100vh - (1.5rem * 2) - 56px);">
        <b-row class="h-100">
            <!-- CONTACTOS -->
            <b-col cols="4">
                <!-- CHAT STRUCTURE -->
                <contact-list-component 
                    v-on:conversationSelected="changeActiveConversation($event)"
                ></contact-list-component>
            </b-col>

            <!-- MENSAJES -->
            <b-col cols=8 class="h-100">
                <active-conversation-component 
                    v-if="selectedConversation"
                    :contact-id="selectedConversation.contact_id"
                    :contact-name="selectedConversation.contact.name"
                    :messages="messages"
                ></active-conversation-component>
            </b-col>
        </b-row>
    </b-container>
</template>
<script>
export default {
    props: {
        userId: Number,
    },
    data(){
        return {
            selectedConversation: null,
            messages: []
        }
    },
    mounted(){
        // Escuchando el evento por el canal 
        Echo.channel('example').listen('MessageSent', (data) => {

            const message = data.message;
            message.written_by_me = (this.userId == message.from_id); // Agregando la propiedad written_by_me para que sea compatible con los mensajes
            // console.log(message);
            this.messages.push(message);   

        });
    },
    methods: {
        changeActiveConversation(conversation){
            // console.log('Cambiando la conver ', conversation);
            this.selectedConversation = conversation;
            this.getMessages();
        },
        getMessages(){
            // Obteniendo los mensajes
            axios.get(`/api/messages?contact_id=${this.selectedConversation.contact_id}`)
                .then((response) => {
                    this.messages = response.data;
                });
        },
    }
}
</script>
