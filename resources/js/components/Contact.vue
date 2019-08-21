<template>
    <b-list-group-item :variant="variant">
        <b-row align-h="center">
            <b-col cols="12" md="3" class="text-center">
                <b-img rounded="circle" width="60" height="60" alt="Person" :src="conversation.contact_image"
                ></b-img>
            </b-col>
            <b-col cols="6" align-self="center" class="d-none d-md-block">
                <p class="mb-1">
                    <conversation-status-component :online="conversation.online" />
                    {{ conversation.contact_name }}
                </p>
                <p class="text-muted small mb-0">{{ conversation.last_message }}</p>
            </b-col>
            <b-col cols="3" align-self="center" class="d-none d-md-block">
                <p class="mb-0">{{ lastTime }}</p>
            </b-col>
        </b-row>
    </b-list-group-item>
</template>

<script>
    export default {
        props: {
            conversation: Object,
            selected: Boolean
        },
        data(){
            return {
            }
        },
        mounted(){            
        },
        methods: {
            
        },
        computed: {
            lastTime() {
                return Moment(this.conversation.last_time, "YYYY-MM-DD hh:mm:ss").locale('es').fromNow();
            },
            variant(){
                return this.selected ? 'secondary' : '';
            }
        }
    }
</script>
