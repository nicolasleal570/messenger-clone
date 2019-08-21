<template>  
    <b-list-group>
            <contact-component 
                v-for="conversation in conversations"
                :key="conversation.id"
                :conversation="conversation"
                :selected="selectedConversationId === conversation.id"
                @click.native="selectConversation(conversation)"
            ></contact-component>
    </b-list-group>
</template>
<script>
export default {
        props: {
            conversations: Array
        },
        data(){
            return {
                selectedConversationId: null
            }
        },
        mounted(){
            // this.getConversations()            
        },
        methods: {
            selectConversation(conversation){
                this.selectedConversationId = conversation.id;
                this.$emit('conversationSelected', conversation); // Evento que se emite                
            }
        }
    }
</script>
