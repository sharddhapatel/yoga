@extends('Admin.header_footer')
@section('title')
    Edit Product
@endsection
@section('content')

    <body class="animsition">
        <div class="page-wrapper">
            <div class="page-container">
                <div class="main-content">
                    <div class="container" style="display: flex;">
                        <div class="login-wrap">
                            <div style=" float: left;">
                                <button type="submit" class="btn btn-primary"><a href="{{ url('showproduct') }}"
                                        style="color: white;">Show Products</a></button>
                            </div>
                            <br><br>
                            <div class="login-content" style="  width: 640px;">
                                <div class="login-logo">
                                    <h4>Edit Products</h4>
                                </div>
                                <div class="login-form">

                                    @if (Session::has('message'))
                                        <div class="alert alert-success">
                                            <i class="fa-lg fa fa-warning"></i>
                                            {!! session('message') !!}
                                        </div>
                                    @elseif(Session::has('error'))
                                        <div class="alert alert-danger">
                                            <i class="fa-lg fa fa-warning"></i>
                                            {!! session('error') !!}
                                        </div>
                                    @endif
                                    <form class="form-horizontal" action="{{ url('editmyitem') }}" method="post"
                                        enctype='multipart/form-data'>
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="id" id="id"
                                                value="{{ $data->id }}">

                                            <div class="form-group row">
                                                <label for="" class="col-form-label">Category</label>
                                                <select name="cid" id="categoryList" class="form-control">
                                                    {{-- <option selected disabled> Select a category...</option> --}}
                                                    @foreach ($category as $cat){
                                                        @if ($cat->id == $data->cid)
                                                            <option value="{!! $cat->id !!}" selected>
                                                                {!! $cat->cname !!}
                                                            </option>

                                                        @else
                                                            <option value="{!! $cat->id !!}">
                                                                {!! $cat->cname !!}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label">Title</label>
                                                <input type="text" name="title" id="title" class="form-control"
                                                    value="{{ $data->title }}">
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-form-label">Image</label>
                                                <div class="col-sm-8">
                                                    <img id="blah" src="{{ url('item_img') }}/{{ $data->item_img }}"
                                                        alt="" height="100" width="100"
                                                        style="width: 100%; margin: 20px 50px;" />
                                                    <br>
                                                    <input class="file" data-preview-file-type="text"
                                                        style="    margin-left: 50px;" type='file' id="imgInp"
                                                        name="image[]" value="{{ $data->item_img }}" />

                                                    <input type="hidden" name="oldimg" id="oldimg"
                                                        value="{{ $data->item_img }}">

                                                    <div id="item_img_preview"></div>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="form-group row">
                                                <label for="" class="col-form-label">Description</label>
                                                <textarea class="form-control" id="description" rows="10"
                                                    name="description">{{ $data->description }}</textarea>
                                            </div>
                                            <br>

                                            <div class="form-group row">
                                                <label for="" class="col-form-label">Populer News</label>

                                                <input type="checkbox" name="populer" value="1" @if (old('populer', $data->status) == '1') checked @endif
                                                    style="margin-top: 13px; margin-left: 10px;" />


                                                {{-- @if ($data->status === '1')
                                                    <input type="checkbox" name="populer" value="1" checked
                                                        style="margin-top: 13px; margin-left: 10px;" />
                                                @else
                                                    <input type="checkbox" name="populer" value="0"
                                                        style="margin-top: 13px; margin-left: 10px;" />
                                                @endif --}}

                                            </div>
                                            <br>
                                            <div class="form-group row">
                                                <div class="offset-sm-0 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Edit</button> <button
                                                        type="reset" class="btn btn-danger">Cancel</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="login-wrap">
                            <div style="float: left;">
                                <button type="submit" class="btn btn-primary"><a href="{{ url('showimage') }}"
                                        style="color: white;">Show Products Image</a></button>
                            </div>
                            <br><br>
                            <div class="login-content">
                                <div class="login-logo">
                                    <h4>Add Products Image</h4>
                                </div>
                                <div class="login-form">

                                    @if (Session::has('message'))
                                        <div class="alert alert-success">
                                            <i class="fa-lg fa fa-warning"></i>
                                            {!! session('message') !!}
                                        </div>
                                    @elseif(Session::has('error'))
                                        <div class="alert alert-danger">
                                            <i class="fa-lg fa fa-warning"></i>
                                            {!! session('error') !!}
                                        </div>
                                    @endif

                                    <form class="form-horizontal" action="{{ url('addimagedetail') }}" method="post"
                                        enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="form-group row">
                                            {{-- <label class="  col-form-label">Product Id</label> --}}
                                            <input type="hidden" name="pid" id="pid" value="{{ $data->id }}"
                                                class="form-control">
                                        </div>
                                        <div class="form-group row">
                                            <label class="  col-form-label">Title</label>
                                            <input type="text" name="ptitle" class="form-control">
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label" for="">Product Image</label><br>
                                            <input type="file" name="pimage" id="pimage" class="file form-control"
                                                data-preview-file-type="text">
                                            <div id="item_img_preview"></div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="" class="col-form-label">Description</label>
                                            <textarea class="form-control" name="des" id="des" rows="5"></textarea>
                                        </div>


                                        <div class="form-group row">
                                            <div class="offset-sm-0 col-sm-10">
                                                <button type="submit" class="btn btn-success">Submit</button> <button
                                                    type="reset" class="btn btn-danger">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        function readURL(input, imgControlName) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {

                    $(imgControlName).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            var imgControlName = "#blah";
            readURL(this, imgControlName);

        });

        function checkNum(event) {

            if ((event.keyCode > 64 && event.keyCode < 91) || (event.keyCode > 96 && event.keyCode < 123) || event
                .keyCode == 8 || event.keyCode == 32)
                return true;
            else {
                return false;
            }

        }
    </script>
@endsection
