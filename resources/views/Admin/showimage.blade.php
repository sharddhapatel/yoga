@extends('Admin.header_footer')
@section('title')
    Show Products
@endsection
@section('content')
    <html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <style>
        .modal-backdrop {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 0;
            background-color: rgba(0, 0, 0, 0);
        }

    </style>

    <body class="animsition">
        <div class="page-wrapper">
            <div class="page-container">
                <div class="main-content">
                    <div class="section__content section__content--p30">

                        <p style="font-size:24px"><strong>Product Sub Image:</strong></p>
                        <br><br>


                        <br>

                        <form class="form-horizontal" action="" method="get">
                            {{ csrf_field() }}

                            <div style="float: left;">
                                <b><label>Search:</label></b> &nbsp;
                                <input type="text" name="search" id="search" value="{{ $search }}"
                                    onkeyup="myFunction()" placeholder="Search Item">
                            </div>

                        </form>
                        <br><br>

                        <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
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
                                        <div class="table-responsive m-b-40">
                                            <table class="table table-borderless table-data3" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th><strong>Id</strong></th>
                                                        <th><strong>ProductId</strong></th>
                                                        <th><strong>Title</strong></th>
                                                        <th><strong>Description</strong></th>
                                                        <th><strong>Image</strong></th>
                                                        <th><strong>Edit</strong></th>
                                                        <th><strong>Delete</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach ($data as $user)
                                                        <tr class="tr-shadow">
                                                            <td>{{ $user->id }}</td>
                                                            <td>{{ $user->pid }}</td>

                                                            <td>{{ $user->ptitle }}</td>
                                                            <td>{{ Str::limit($user->des, 120) }}</td>
                                                            <td>
                                                                @if ($user->pimage != '')

                                                                    <img src="{{ url('pimage') }}/{{ $user->pimage }}"
                                                                        alt="" height="80px" width="80px">

                                                                    {{-- <video id="my-video" class="video-js" controls preload="auto" width="200" height="100" data-setup="{}">
																<source src="{{ url('item_img') }}/{{$user->item_img}}" type='video/mp4'>
															 </video> --}}
                                                                @else
                                                                    <p>Noimage</p>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button type="submit" data-toggle="modal"
                                                                    data-target="#myModal-2{{ $user->id }}"
                                                                    class="btn btn-primary">Edit</button>
                                                            </td>
                                                            <td>
                                                                <a href='deleteimage/{{ $user->id }}'><button
                                                                        type="submit"
                                                                        class="btn btn btn-danger">Delete</button></a>
                                                            </td>
                                                        </tr>

                                                        <div class="modal fade" id="myModal-2{{ $user->id }}"
                                                            role="dialog" style="    margin-top: 100px;">
                                                            <div class="modal-dialog">


                                                                <div class="modal-content" style="margin-bottom: 15px;">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">&times;</button>
                                                                        <h4 class="modal-title">Edit </h4>
                                                                    </div>
                                                                    <form method="post" action="{{ url('editimage') }}"
                                                                        enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                        <div class="form-group"
                                                                            style="background:#fff; border-radius: 4px;    margin-bottom: 15px;">
                                                                            {{-- <div class="input-group input-group-outline"
                                                                                style="background:#fff; border-radius: 4px;    margin-bottom: 15px;"> --}}

                                                                            <input type="hidden" name="id"
                                                                                value="{{ $user->id }}"
                                                                                class="form-control">


                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Title</label>
                                                                                <input type="text" name="ptitle" id="ptitle"
                                                                                    class="form-control"
                                                                                    value="{{ $user->ptitle }}">
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label for=""
                                                                                    class="col-form-label">Description</label>
                                                                                <textarea class="form-control" id="des"
                                                                                    rows="10"
                                                                                    name="des">{{ $user->des }}</textarea>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Image</label>
                                                                                <br><br>
                                                                                <div class="col-sm-8">
                                                                                    <img id="blah"
                                                                                        src="{{ url('pimage') }}/{{ $user->pimage }}"
                                                                                        alt="" height="100" width="100" />
                                                                                    <br>
                                                                                    <input class="file"
                                                                                        data-preview-file-type="text"
                                                                                        type='file' id="imgInp"
                                                                                        name="pimage"
                                                                                        value="{{ $user->pimage }}" />

                                                                                    <input type="hidden" name="oldimg"
                                                                                        id="oldimg"
                                                                                        value="{{ $user->pimage }}">

                                                                                    <div id="item_img_preview">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            {{-- </div> --}}

                                                                        </div>
                                                                        <br><br><br><br><br>
                                                                        <div class="form-group">
                                                                            <button type="submit"
                                                                                class="btn btn-success">Submit</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    @endforeach

                                                </tbody>

                                            </table>
                                        </div>
                                        <div class="pagination-bar text-center" style="float: right;">
                                            <nav aria-label="Page navigation " class="d-inline-b">
                                                <ul class="pagination" role="navigation">
                                                    <li class="page-item active">
                                                        {{ $data->appends(\Request::except('_token'))->render() }}</li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                tr[i].style.display = "none";

                for (j = 0; j < td.length; j++) {
                    if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    }
                }
            }
        }


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
    </script>
@endsection
