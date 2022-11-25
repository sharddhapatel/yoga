@extends('Admin.header_footer')
@section('title')
    Show Category
@endsection
@section('content')

    <html>

    <body class="animsition">
        <div class="page-wrapper">
            <div class="page-container">
                <div class="main-content">
                    <div class="section__content section__content--p30">


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

                        <p style="font-size:24px"><strong>Category</strong></p>
                        <br>
                        <div style="float: right;">
                            <button type="submit" class="btn btn-primary"><a href="{{ url('categoryindex') }}"
                                    style="color: white;">Add Category</a></button>
                        </div>
                        <br>
                        <form class="form-horizontal" action="" method="get">
                            <div style="float: left;">
                                {{ csrf_field() }}
                                <b><label>Search:</label></b> &nbsp;
                                <input type="text" name="search" id="search" value="{{ $search }}"
                                    onkeyup="myFunction()" placeholder="Search Category">


                            </div>

                        </form>
                        <br><br>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="table-responsive m-b-20">
                                        <table class="table table-borderless table-data3" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th><strong>Category Id</strong></th>
                                                    <th><strong>Category Name</strong></th>
                                                    <th><strong>Edit</strong></th>
                                                    <th><strong>Delete</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $user)
                                                    <tr class="tr-shadow">
                                                        <td>{{ $user->id }}</td>
                                                        <td>{{ $user->cname }}</td>


                                                        <td>
                                                            <a href='editevent/{{ $user->id }}'><button type="submit"
                                                                    class="btn btn-primary">Edit</button></a>
                                                        </td>
                                                        <td>
                                                            <a href='admindelete/{{ $user->id }}'><button type="submit"
                                                                    class="btn btn btn-danger">Delete</button></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @if (count($data) <= 0)
                                                    <td colspan="10" style="color: red;">
                                                        <center><b style="font-size: 20px;">Result Not Found</b></center>
                                                    </td>
                                                @endif
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
