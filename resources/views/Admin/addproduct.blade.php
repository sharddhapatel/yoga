@extends('Admin.header_footer')
@section('title')
    Product
@endsection
@section('content')

    <body class="animsition">
        <div class="page-wrapper">
            <div class="page-content--bge5">
                <div class="container">
                    <div class="login-wrap">
                        <br>
                        <div style="float: left;">
                            <button type="submit" class="btn btn-primary"><a href="{{ url('showproduct') }}"
                                    style="color: white;">Show Product</a></button>
                        </div>
                        <br><br>
                        <div class="login-content">
                            <!-- <div class="login-logo">
                                                                                                                                                        <h4>Category</h4>
                                                                                                                                                    </div> -->
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

                                <form class="form-horizontal" action="{{ url('addproduct') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <?php $category = App\Category::get(); ?>
                                    <div class="form-group row">
                                        <label for="" class="col-form-label">Category</label>
                                        <select name="category_id" id="categoryList" class="form-control">
                                            <option selected disabled> Select a category...</option>
                                            @foreach ($category as $cat){
                                                <option value="{!! $cat->id !!}">{!! $cat->cname !!}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label class="  col-form-label">Title</label>
                                        <input type="text" name="title" id="title" class="form-control">
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-form-label" for="">Product Image</label><br>
                                        <input type="file" name="item_img[]" id="item_img" class="file form-control"
                                            data-preview-file-type="text">
                                        <div id="item_img_preview"></div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description"
                                            rows="10"></textarea>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-form-label">Populer News</label>

                                        <input type="checkbox" name="populer" value="1"
                                            style="margin-top: 13px; margin-left: 10px;" />
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-0 col-sm-10">
                                            <button type="submit" class="btn btn-success">Submit</button> <button
                                                type="reset" class="btn btn-danger">Cancel</button>
                                        </div>
                                    </div>
                                </form>

                                <br><br>

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
        $("#item_img").change(function() {

            $('#item_img_preview').html("");
            var total_file = document.getElementById("item_img").files.length;
            for (var i = 0; i < total_file; i++) {
                $('#item_img_preview').append("<img src='" + URL.createObjectURL(event.target.files[i]) +
                    "' height='60' width='60' >");
            }
        });


        function checkNum(event) {

            if ((event.keyCode > 64 && event.keyCode < 91) || (event.keyCode > 96 && event.keyCode < 123) || event
                .keyCode == 8)
                return true;
            else {
                return false;
            }

        }

        $("#cname").focusout(function() {
            var cname = $("#cname").val();
            if (cname == '') {
                $("#cname").css({
                    "border-color": "red",
                    "border-style": "solid"
                });
                document.getElementById("cname_validation").innerHTML =
                    "<font style=color:red> Please enter cname</font>";
            } else {
                var a = /^[A-Za-z\s]+$/;

                if (!cname.match(a)) {
                    $("#cname").css({
                        "border-color": "red",
                        "border-style": "solid"
                    });
                    document.getElementById("cname_validation").innerHTML =
                        "<font style=color:red>Name can have only alphabets, spaces and dashes</font>";
                } else {
                    $("#cname").css({
                        "border-color": "black",
                        "border-style": "solid"
                    });
                    document.getElementById("name_validation").innerHTML = "<font style=color:white></font>";
                }

            }
        });




        //    $('#categoryList').on('change', function () {
        //     $("#subcategoryList").attr('disabled', false); //enable subcategory select
        //     $("#subcategoryList").val("");
        //     $(".subcategory").attr('disabled', true); //disable all category option
        //     $(".subcategory").hide(); //hide all subcategory option
        //     $(".parent-" + $(this).val()).attr('disabled', false); //enable subcategory of selected category/parent
        //     $(".parent-" + $(this).val()).show(); 
        // });
    </script>
@endsection
