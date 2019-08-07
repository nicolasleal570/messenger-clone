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
                <active-conversation-component v-if="selectedConversation"
                    :contact-id="selectedConversation.contact_id"
                ></active-conversation-component>
            </b-col>
        </b-row>
    </b-container>
</template>
<script>
export default {
    data(){
        return {
            selectedConversation: null,
        }
    },
    mounted(){

    },
    methods: {
        changeActiveConversation(conversation){
            // console.log('Cambiando la conver ', conversation);
            this.selectedConversation = conversation;
        }
    }
}
</script>
