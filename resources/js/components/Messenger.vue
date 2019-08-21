<template>
    <b-container fluid style="height: calc(100vh - (1.5rem * 2) - 56px);">
        <b-row class="h-100">
            <!-- CONTACTOS -->
            <b-col cols="4">
                <!-- CHAT STRUCTURE -->
                <b-form>
                    <b-form-group>
                        <b-form-input class="text-center"
                            type="text"
                            v-model="querySearch"
                            placeholder="Buscar Contacto"
                        ></b-form-input>
                    </b-form-group>
                </b-form>
                <contact-list-component 
                    v-on:conversationSelected="changeActiveConversation($event)"
                    :conversations="conversationsFiltered"
                ></contact-list-component>
            </b-col>

            <!-- MENSAJES -->
            <b-col cols=8 class="h-100">
                <active-conversation-component 
                    v-if="selectedConversation"
                    :contact-id="selectedConversation.contact_id"
                    :contact-name="selectedConversation.contact.name"
                    :messages="messages"
                    :my-image="myImageUrl"
                    :contact-image="selectedConversation.contact_image"
                    @messageCreated="addMessage($event)"
                ></active-conversation-component>
            </b-col>
        </b-row>
    </b-container>
</template>
<script>
export default {
    props: {
        user: Object,
    },
    data(){
        return {
            selectedConversation: null,
            messages: [],
            conversations: [],
            querySearch: '',
        }
    },
    mounted(){

        this.getConversations();

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
        changeActiveConversation(conversation){
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
        addMessage(message){

            const conversation = this.conversations.find( (conversation) => {
                return  conversation.contact_id == message.from_id || conversation.contact_id == message.to_id;
            });            

            const author = this.user.id === message.from_id ? 'Tú' : conversation.contact_name;
            conversation.last_message = `${author}: ${message.content}`;
            conversation.last_time = message.created_at;

            if (this.selectedConversation.contact_id == message.from_id 
                || this.selectedConversation.contact_id == message.to_id) {
                this.messages.push(message);  
            }                  
        },
        getConversations(){
            axios.get('/api/conversations').then((response) => {
                this.conversations = response.data;
            });
        },
        changeStatus(user, status){
            const index = this.conversations.findIndex((conversation) => {
                return conversation.contact_id == user.id;
            });

            if(index >= 0)
                Vue.set(this.conversations[index], 'online', status);
        }

    },
    computed: {
        // Busar contactos 
        conversationsFiltered(){
            return this.conversations.filter((conversation) => conversation.contact_name
            .toLowerCase()
            .includes(this.querySearch.toLowerCase()));
        },
        myImageUrl(){
            return `/users/${this.user.avatar}`;
        }
    }
}
</script>
