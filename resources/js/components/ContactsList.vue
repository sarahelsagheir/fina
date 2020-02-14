<template>
  <div class="col-md-4 col-xl-3 chat">
    <div class="card mb-sm-3 mb-md-0 contacts_card">
       <div class="card-header msg_head">
        <h2 style="color:white">Chats</h2>
      </div>
      <div class="card-body contacts_body">
        <ul class="contacts">
          <li
            v-for="contact in sortedContacts"
            :key="contact.id"
            @click="selectContact(contact)"
            :class="{ 'selected': contact == selected }"
          >
            <div class="d-flex bd-highlight">
              <div class="img_cont">
                <img :src="contact.cover" class="rounded-circle user_img" />

                <!-- <span class="online_icon"></span> -->
              </div>
              <div class="user_info">
                <span>{{ contact.name }}</span>
                <p>{{ contact.email }}</p>
              </div>
            </div>
            <span class="unread" v-if="contact.unread">{{ contact.unread }}</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    contacts: {
      type: Array,
      default: []
    }
  },
  data() {
    return {
      selected: this.contacts.length ? this.contacts[0] : null
    };
  },
  methods: {
    selectContact(contact) {
      this.selected = contact;
      this.$emit("selected", contact);
    }
  },
  computed: {
    sortedContacts() {
      return _.sortBy(this.contacts, [
        contact => {
          if (contact == this.selected) {
            return Infinity;
          }
          return contact.unread;
        }
      ]).reverse();
    }
  }
};
</script>

<style lang="scss" scoped>
.chat {
  margin-top: auto;
  margin-bottom: auto;
}

.card {
  height: 500px;
  border-radius: 15px !important;
  background-color:  #074985 !important;
  border: none;
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

 
}

.contacts_body {
  padding: 0.75rem 0 !important;
  overflow-y: auto;
  white-space: nowrap;
  background: #fff;
}

.contacts_body {
  padding: 0.75rem 0 !important;
  overflow-y: auto;
  white-space: nowrap;
}

.contacts {
  list-style: none;
  padding: 0;
}

.img_cont {
  position: relative;
  height: 70px;
  width: 70px;
}

.user_info {
  margin-top: auto;
  margin-bottom: auto;
  margin-left: 15px;
}
.user_info span {
  font-size: 20px;
  // color: white;
}
.user_info p {
  font-size: 10px;
//   color: rgba(255, 255, 255, 0.6);
}

	.msg_head{
		position: relative;
	}

.user_img {
  height: 70px;
  width: 70px;
  border: 1.5px solid #f5f6fa;
}

li {
  margin: 10px;
  position: relative;
  // padding-bottom: 5px;
  // border-bottom: 1px solid #ccc;
}

.selected{
  background: #eee;
  padding: 10px;
  border-radius: 10px
}

.unread {
  background: rgb(55, 157, 170);
  color: #fff;
  position: absolute;
  right: 11px;
  top: 30px;
  display: flex;
  font-weight: 700;
  min-width: 20px;
  justify-content: center;
  align-items: center;
  line-height: 20px;
  font-size: 12px;
  padding: 0 4px;
  border-radius: 50%;
}
</style>
