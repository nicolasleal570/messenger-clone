<template>
    <b-container fluid style="height: calc(100vh - (1.5rem * 2) - 56px);">
        <b-row class="h-100">
            <!-- CONTACTOS -->
            <b-col cols="4">
                <!-- CHAT STRUCTURE -->
                <contact-form-component/>

                <!-- LISTADO DE CONTACTOS -->
                <contact-list-component />
            </b-col>

            <!-- MENSAJES -->
            <b-col cols=8 class="h-100">
                <b-card header-tag="header" footer-tag="footer">
                    <h6 slot="header" class="mb-0">Bienvenidos! </h6>
                    <b-card-text>Selecciona un chat y envía mensajes a quien quieras.</b-card-text>
                </b-card>
            </b-col>
        </b-row>
    </b-container>
</template>
<script>
export default {
    props: {
        user: Object,
    },
    mounted(){

        this.$store.commit('setUser', this.user);
        this.$store.dispatch('getConversations')
                    .then(() => {
                        const conversationId = this.$route.params.conversationId;

                        if (conversationId) {
                            const conversation = this.$store.getters.getConversationById(conversationId); 
                            this.$store.dispatch('getMessages', conversation);
                        }
                    });

        // Escuchando el evento por el canal 
        Echo.private(`users.${this.user.id}`)
            .listen('MessageSent', (data) => {                

                const message = data.message;  
                message.written_by_me = false;                
                this.addMessage(message);  

        });

        Echo.join(`messenger`)
            .here((users) => {
                users.forEach((user) => this.changeStatus(user, true));
            })
            .joining((user) => this.changeStatus(user, true))
            .leaving((user) => this.changeStatus(user, false));

    },
    methods: {
        changeStatus(user, status){            
            const index = this.$store.state.conversations.findIndex((conversation) => {
                return conversation.contact_id == user.id;
            });

            if(index >= 0)
                this.$set(this.$store.state.conversations[index], 'online', status);
        }, 
        addMessage(message){            
            this.$store.commit('addMessage', message);
        }
    },
    computed: {
        selectedConversation(){
            return this.$store.state.selectedConversation;
        }
    }
}
</script>
