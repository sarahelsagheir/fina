<template>
  <div class="card-footer">
    <div class="input-group">
      <!-- <div class="input-group-append">
        <span class="input-group-text attach_btn">
          <i class="fas fa-paperclip"></i>
        </span>
      </div>-->
      <textarea
        class="form-control type_msg"
        v-model="message"
        @keydown.enter="send"
        placeholder="Message..."
      ></textarea>

      <div class="input-group-append">
        <span class="input-group-text send_btn">
          <i class="fa fa-location-arrow"></i>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: ""
    };
  },
  methods: {
    send(e) {
      e.preventDefault();

      if (this.message == "") {
        return;
      }
      this.$emit("send", this.message);
      this.message = "";
    }
  }
};
</script>

<style lang="scss" scoped>
.card-footer {
  border-top: 1px solid #c4c4c4;
  position: relative;
  // box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  border: none
  // border-radius: 0 0 15px 15px !important;
  // border-top: 0 !important;
  
}

.type_msg {
 	border: none;
	border-radius: 20px;
	outline: none;
	padding: 10px;
	font-family: 'Sniglet', cursive;
	font-size: 1em;
	color: #676767;
	transition: border 0.5s;
	-webkit-transition: border 0.5s;
	-moz-transition: border 0.5s;
	-o-transition: border 0.5s;
	/* border: solid 3px #98d4f3;	 */
	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
    box-sizing:border-box;
    height: 50px;	
	resize: none; 
	overflow: auto;

 
  width: 100%;
  
}
.type_msg:focus {
  box-shadow: none !important;
  outline: 0px !important;
}
.send_btn {
  border-radius: 0 15px 15px 0 !important;
  background-color: rgba(0, 0, 0, 0.3) !important;
  border: 0 !important;
  color: white !important;
  cursor: pointer;
  
}
</style>

