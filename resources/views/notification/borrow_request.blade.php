<p>
<a href="{{route('user.rate.index',$notification->data['user_id'])}}">{{($notification->data['user_name'])}}</a> want to borrow {{$notification->data['title']}}<br>
    <a class="p-2 m-1" href="{{'/approveNotification/'.$notification->data['user_id'].'/'.$notification->data['product_id']}}">Approve </a>

    <a class="p-2 m-1" href="{{route('disapprove.notification',$notification->data['user_id'])}}">Disapprove</a>

</p>

<style>
 p a.p-2{
     display: inline-block;
     border: none;
     font-size: 14px;
     background: white;
     border-radius: 5px;


 }
 p a.p-2:hover{
    color: #aaa
 }



</style>
