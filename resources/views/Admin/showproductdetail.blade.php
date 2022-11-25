@extends('Admin.header_footer')
@section('title')
    Show Product Detail
@endsection
@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="pull-right backtolist"><a href="{{ url('showproduct') }}"> <i
                                    class="fa fa-angle-double-left"></i> Back to Results</a></div>
                    </div>
                </div>
                <div class="container">

                    <div class="row">
                        <div style="padding-left: 100px">
                            <div class="card" style="width:1000px;">
                                <div class="card-body login-card-body">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-10 page-content col-thin-right">
                                        <div class="inner inner-box ads-details-wrapper">
                                            <center>
                                                @foreach ($data as $image)
                                                    <h3> {{ $image->title }}</h3>
                                                    <br>
                                                    <div class="item-slider">
                                                        <ul class="bxslider">
                                                            @php $a = explode(",",$image->item_img); @endphp
                                                            @foreach ($a as $b)
                                                                <img class="myImages" id="myImg"
                                                                    src="{{ url('item_img') }}/{{ $b }}" alt=""
                                                                    height='380' width='330' />
                                                            @endforeach
                                                        </ul>
                                                    </div>

                                                    <br>
                                                    <div class="Ads-Details">
                                                        <h5 class="list-title"><strong><u>Ads Detsils</u></strong></h5><br>
                                            </center>
                                            <p> {!! nl2br(e($image->description)) !!}</p>

                                            <br><br>
                                            <div class="row">
                                                <div class="col-md-7">
                                                </div>
                                                <div class="col-md-16">
                                                    <aside class="panel panel-body panel-details">
                                                        <ul>
                                                            <li>
                                                                <p class="no-margin"><strong>Category
                                                                        Name:</strong>{{ $image->cname }} </p>
                                                            </li>

                                                            <li>
                                                                <p class="no-margin"><strong>Sub Category Name:</strong>
                                                                    {{ $image->title }}</p>
                                                            </li>

                                                        </ul>
                                                    </aside>

                                                </div>

                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
