<template>
  <b-row class="h-100">
    <b-col cols="8" class="h-100">
      <b-card class="h-100" no-body>
        <b-card-body class="card-body-scroll">
          <message-conversation-component
            v-for="message in messages"
            :key="message.id"
            :image="message.written_by_me ? myImage : selectedConversation.contact_image"
            :written-by-me="message.written_by_me"
          >{{ message.content }}</message-conversation-component>
        </b-card-body>

        <!-- BTN ENVIAR MENSAJE -->
        <div slot="footer">
          <b-form @submit.prevent="postMessage" class="mb-0">
            <b-input-group>
              <b-form-input
                autocomplete="off"
                type="text"
                v-model="newMessage"
                placeholder="Escribe tu mensaje..."
              ></b-form-input>
              <b-input-group-append>
                <b-btn type="submit" variant="primary">Enviar</b-btn>
              </b-input-group-append>
            </b-input-group>
          </b-form>
        </div>
      </b-card>
    </b-col>

    <b-col cols="4" class="text-center">
      <b-img
        rounded="circle"
        width="150"
        height="150"
        class="mb-4"
        alt="Person"
        :src="selectedConversation.contact_image"
      ></b-img>
      <p class="text-left">{{ selectedConversation.contact_name }}</p>
      <hr />
      <b-form-checkbox>Desactivar notificaciones</b-form-checkbox>
    </b-col>
  </b-row>
</template>
<style>
.card-body-scroll {
  max-height: calc(100vh - 63px);
  overflow-y: auto;
}
</style>

<script>
export default {
  data() {
    return {
      newMessage: ""
    };
  },
  methods: {
    postMessage() {
      this.$store.dispatch("postMessage", this.newMessage);
    },
    scrollToBottom() {
      const el = document.querySelector(".card-body-scroll");
      el.scrollTop = el.scrollHeight;
    }
  },
  computed: {
    myImage(){
        return `/users/${this.$store.state.user.avatar}`;
    },

    messages() {
      return this.$store.state.messages;
    },
    selectedConversation() {
      return this.$store.state.selectedConversation;
    }
  },
  updated() {
    this.scrollToBottom();
  }
};
</script>
