<template>
  <b-row class="h-100">
    <b-col cols="8" class="h-100">
      <b-card class="h-100" no-body>
        <b-card-body title="Conversación Activa" class="card-body-scroll">
          <message-conversation-component
            v-for="message in messages"
            :key="message.id"
            :image="message.written_by_me ? myImage : contactImage"
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
      <b-img rounded="circle" width="150" height="150" class="mb-4" alt="Person" :src="contactImage"></b-img>
      <p class="text-left">{{ contactName }}</p>
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
  props: {
    contactId: Number,
    contactName: String,
    messages: Array,
    contactImage: String,
    myImage: String
  },
  data() {
    return {
      newMessage: ""
    };
  },
  mounted() {

  },
  methods: {
    postMessage() {
      const params = {
        to_id: this.contactId,
        content: this.newMessage
      };
      axios.post("/api/messages", params).then(response => {
        // console.log(response.data);
        if (response.data.success) {

          this.newMessage = "";
          const message = response.data.message;
          message.written_by_me = true;
          
          this.$emit('messageCreated', message);

        }
      });
    },
    scrollToBottom() {
      const el = document.querySelector(".card-body-scroll");
      el.scrollTop = el.scrollHeight;
    }
  },
  updated() {
    this.scrollToBottom();
  }
};
</script>
