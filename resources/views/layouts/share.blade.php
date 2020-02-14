<div id="shareBook" class="modal fade" role="dialog">
            <div class="modal-dialog">
            <p style="display:none">
            
            </p>
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                   
                    <div class="register-form">
                       
                        <form class="px-5 py-4" enctype="multipart/form-data" action="{{route('addBook')}}" method="post" style="border: none; box-shadow: 4px 4px 8px 4px rgba(0, 0, 0, 0.2);">
                            @csrf
                            <div class="group-input">
                                <label for="title"><strong>Title:</strong></label>
                                <input style="border: none;border-bottom:1px solid #ccc;border-radius:0" type="text" class="form-control" id="title" name="title">

                            </div>
                            @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="group-input">
                                <label for="author"><strong>Author:</strong></label>
                                <input style="border: none;border-bottom:1px solid #ccc;border-radius:0" type="text" class="form-control" id="author" name="author">
                            </div>
                            @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="group-input">
                                <label for="category"><strong>Category:</strong></label>
                                <select style="border: none;border-bottom:1px solid #ccc;border-radius:0" class="browser-default custom-select" id="category" name="category">
                                    <option disabled selected>Open this select menu</option>
                                    <option value="Fiction">Fiction</option>
                                    <option value="History">Histroy</option>
                                    <option value="classics">classics</option>
                                    <option value="non-Fiction">non-Fiction</option>
                                    <option value="Historical-Fiction">Historical-Fiction</option>
                                    <option value="Childern">CHildern</option>
                                    <option value="Biography">Biography</option>
                                    <option value="Horror">Horror</option>
                                    <option value="Thriller">Thriller</option>
                                    <option value="Romance">Romance</option>
                                    <option value="Sci-Fiction">Sci-Fiction</option>
                                </select>
                            </div>
                            <div class="group-input">
                                <label for="cover"><strong>Cover</strong></label>
                                <div style="border: none;border-bottom:1px solid #ccc;border-radius:0">
                                    <input type="file" name="cover" style="opacity:0" class="form-control">
                                </div>
                                @error('cover')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            </div>
                            <button type="submit" class="btn register-btn">Share</button>
                            </form>
                           
                       
                   
                </div>
            </div>
                    </div>
                   
                </div>

            </div>