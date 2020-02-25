<style>
    
    li.au{
        font-size:25px
    }
</style>
<div class="text-center">
<h5 class="display-3 text-primary  mb-3 font-weight-bold">{{$book->title}} Info</h5>
</div>
	<section class="product-shop spad page-details">
        <div class="container">
            @if( session()->has('success') )
            <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            <div class="row bg-light"  style="border: none; ">

                <div class="col-lg-10">
                    <div class="row p-3 justify-content-between" >

                        <div class="col-lg-4">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" width="300" src="{{ $book->cover }}" alt="">
                               
                            </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="product-details"  >
                                <div class="pd-title">
                                    <span>{{$book->category}}</span>
                                    <h2 class="font-weight-bold pt-3">{{$book->title}}</h2>
                                    <form action="{{route('wishlist.store')}}" class="heart-icon" id="contact_form" method="post">
                                        {{csrf_field()}}
                                        <input name="user_id" type="text" value="{{Auth::user()->id}}" hidden />
                                        <input name="product_id" type="text" value="{{$book->id}}" hidden />
                                        <button type="submit" style="background: transparent; border:none" class=""><i class="icon_heart_alt"></i></button>
                                    </form>
                                   
                                </div>
                             
                                <div class="pd-desc p-3">
                                    <p>{{$book->description}}</p>
                                    <h4 style="color: #074985">{{$book->price}} L.E</h4>
                                </div>


                                <ul class="pd-tags list-unstyled">
                                    <li class=""><span class="font-weight-bold au">AUTHOR</span>: {{$book->author}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mx-3 my-4">
                            <h5 style=" border-bottom:1px solid #ccc; padding-bottom:10px ; margin-bottom:20px">Comments <i class="fa fa-commenting" style="color: grey" aria-hidden="true"></i></h5>
                            @comments(['model' => $book])
                        </div>
                    </div>
                    </div>




                </div>
            </div>
        </div>
    </section>

