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
                <active-conversation-component 
                    v-if="selectedConversation"
                />
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

        this.$store.dispatch('getConversations');

        // Escuchando el evento por el canal 
        Echo.private(`users.${this.user.id}`).listen('MessageSent', (data) => {

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
        }

    },
    computed: {
        selectedConversation(){
            return this.$store.state.selectedConversation;
        }
    }
}
</script>
