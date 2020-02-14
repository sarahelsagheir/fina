<style>
    textarea{
    width: 85%;
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

	
}

button.notify{
    border: none;
    background: blue;
    color: black;
    border-radius: 50%;
    margin-left: 10px;
    width: 30px;
    height: 30px;
}

	
</style>

<p>
{{($notification->data['user_name'])}} has approve your request<br>
<form action="{{route('send.message',$notification->data['user_id'])}}" class="form-inline my-2" style="border: none" method="post">
@csrf
<textarea  @keydown.enter="send" placeholder="Message..." name="text" id="text"></textarea>
<button type="submit" class="notify"><i class="fa fa-share-square-o" aria-hidden="true"></i></button>
</form>


</p>