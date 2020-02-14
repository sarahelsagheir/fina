<template>
  <div class="col-md-8 col-xl-6 chat">
    <div class="card">
      <div class="card-header msg_head">
        <h2 style="color:white">{{ contact ? contact.name : 'Select a Contact' }}</h2>
      </div>
      <MessagesFeed :contact="contact" :messages="messages" />
      <MessageComposer @send="sendMessage" />
    </div>
  </div>
</template>

<script>
import MessagesFeed from "./MessagesFeed";
import MessageComposer from "./MessageComposer";
export default {
  props: {
    contact: {
      type: Object,
      default: null
    },
    messages: {
      type: Array,
      default: []
    }
  },
  methods: {
    sendMessage(text) {
      if (!this.contact) {
        return;
      }
      axios
        .post("/conversation/send", {
          contact_id: this.contact.id,
          text: text
        })
        .then(response => {
          this.$emit("new", response.data);
        });
    }
  },
  components: { MessagesFeed, MessageComposer }
};
</script>

<style lang="scss" scoped>
.card {
  height: 500px;
  border-radius: 15px !important;
  background-color:	 #074985 !important;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  border: none
}

	.msg_head{
		position: relative;
	}

</style>
