@extends('Admin.header_footer')
@section('title')
    Show Products
@endsection
@section('content')

    <html>

    <body class="animsition">
        <div class="page-wrapper">
            <div class="page-container">
                <div class="main-content">
                    <div class="section__content section__content--p30">

                        <p style="font-size:24px"><strong>Products:</strong></p>
                        <br><br>

                        <div style="float: right;">
                            <button type="submit" class="btn btn-primary"><a href="{{ url('addproduct') }}"
                                    style="color: white;">Add Product</a></button>
                        </div>
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
                                                        <th><strong>ProductId</strong></th>
                                                        <th><strong>Product Category</strong></th>
                                                        <th><strong>Title</strong></th>
                                                        <th><strong>Image</strong></th>
                                                        <th><strong>Edit</strong></th>
                                                        <th><strong>Delete</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @forelse ($data as $user)
                                                        <tr class="tr-shadow">
                                                            <td>{{ $user->id }}</td>
                                                            <td>{{ $user->cname }}</td>
                                                            <td>{{ $user->title }}</td>
                                                            <td>
                                                                @if ($user->item_img != '')

                                                                    @php $a = explode(",",$user->item_img); @endphp
                                                                    <a
                                                                        href="{{ url('showproductdetail') }}/{{ $user->id }}">
                                                                        <img class="thumbnail no-margin" data-toggle="modal"
                                                                            data-target="#myModal{!! $user->id !!}"
                                                                            src="{{ url('item_img') }}/{{ $a[0] }}"
                                                                            alt="img" height="80px" width="80px">
                                                                        {{-- <video id="my-video" class="video-js" controls preload="auto" width="200" height="100" data-setup="{}">
																<source src="{{ url('item_img') }}/{{$user->item_img}}" type='video/mp4'>
															 </video> --}}
                                                                    @else
                                                                        <p>Noimage</p>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href='updatemyitem/{{ $user->id }}'><button
                                                                        type="submit"
                                                                        class="btn btn-primary">Edit</button></a>
                                                            </td>
                                                            <td>
                                                                <a href='productdelete/{{ $user->id }}'><button
                                                                        type="submit"
                                                                        class="btn btn btn-danger">Delete</button></a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <td colspan="10" style="color: red;">
                                                            <center><b style="font-size: 20px;">Result Not Found...</b>
                                                            </center>
                                                        </td>
                                                    @endforelse

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
    </script>
@endsection
