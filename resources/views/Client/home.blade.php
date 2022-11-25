@extends('Client.header_footer')
@section('title')
    Home
@endsection

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

@section('body')

    <style>
        .widget iframe,
        .widget img {
            max-width: 100%;
        }

        a img {
            border: 0;
        }

    </style>
    <div class="flex-center" id="content-wrapper">
        <div class="container row-x1">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                        aria-label="Slide 4"></button>
                    {{-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                        aria-label="Slide 5"></button> --}}
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ URL::asset('slider/sunrise.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Sunrise Yoga</h5>
                            <p>Yoga: a secret to retain beauty of body and mind.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ URL::asset('slider/nature.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Garden Yoga</h5>
                            <p>Practice yoga to transform your body and mind physically, mentally and spiritually.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ URL::asset('slider/food.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Healthy Food</h5>
                            <p>Diet and the Skin: How To Get Healthier Skin From the Inside</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ URL::asset('slider/nnn.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Nature</h5>
                            <p>Yoga gives the unbelievable power.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <div class="flex-center" id="content-wrapper">

        <div class="container row-x1">

            <main id="main-wrapper">

                <div class="main section" id="main" name="Main Posts">
                    <div class="widget Blog" data-version="2" id="Blog1">
                        <div class="blog-posts-wrap">
                            <div class="queryMessage">
                                <span class="query-info query-success">Posts</span>
                            </div>
                            @foreach ($data as $image)
                                <div class="blog-posts hfeed index-post-wrap">
                                    <article class="blog-post hentry index-post post-0">
                                        @php $a = explode(",",$image->item_img); @endphp
                                        @foreach ($a as $b)
                                            <a class="entry-image-wrap is-image"
                                                href="{{ url('pages') }}/{{ $image->id }}"
                                                title="{{ $image->title }}"><img
                                                    src="{{ url('item_img') }}/{{ $b }}" alt="">
                                            </a>
                                        @endforeach

                                        <div class="entry-header">
                                            <span class="entry-category">{{ $image->cname }}</span>

                                            <h2 class="entry-title"><a class="entry-title-link"
                                                    href="{{ url('pages') }}/{{ $image->id }}"
                                                    rel="bookmark">{{ $image->title }} </a></h2>
                                            <p class="entry-excerpt excerpt">{{ Str::limit($image->description, 150) }}
                                            </p>


                                            <div class="entry-meta">
                                                <span class="entry-author mi"><span class="by sp">by</span><span
                                                        class="author-name">Felicity Yoga</span></span>
                                                <span class="entry-time mi"><span class="sp">-</span><time
                                                        class="published"
                                                        datetime="2021-03-22T12:57:00+05:30">{{ \Carbon\Carbon::parse($image->created_at)->format('M d ,Y') }}</time></span>
                                            </div>

                                        </div>
                                    </article>

                                </div>
                            @endforeach
                            <div class="pagination-bar text-center" style="float: right;">
                                <nav aria-label="Page navigation " class="d-inline-b">
                                    <ul class="pagination" role="navigation">
                                        <li class="page-item active">
                                            {{ $data->appends(\Request::except('_token'))->render('pagination::bootstrap-4') }}
                                        </li>
                                    </ul>
                                </nav>
                            </div>


                            <script type="text/javascript">
                                var exportify = {
                                    noTitle: "No title",
                                    viewAll: "View all",
                                    postAuthor: true,
                                    postAuthorLabel: "by",
                                 postDate: true,
                                    postDateLabel: "-",
                                    postLabels: true
                                }
                            </script>
                        </div>
                    </div>
            </main>

            <aside id="sidebar-wrapper">
                <div class="sidebar gnews-free-widget-ready section" id="sidebar" name="Sidebar">
                    <div class="widget HTML" data-version="2" id="HTML9">
                        <div class="widget-content">
                            <script async="async" data-ad-client="ca-app-pub-3940256099942544/6300978111"
                                                        src="{{ URL::asset('assests/client/pagead2.googlesyndication.com/pagead/js/f.txt') }}">
                            </script>
                        </div>
                    </div>

                    <div class="widget PopularPosts" data-version="2" id="PopularPosts2">
                        <div class="widget-title title-wrap">
                            <h3 class="title">Popular Posts</h3>
                        </div>
                        <div class="widget-content default-items">
                            @foreach ($product as $popular)
                                <div class="default-item card-style item-0">
                                    @php $a = explode(",",$popular->item_img); @endphp
                                    @foreach ($a as $b)
                                        <a class="entry-image-wrap before-mask is-image"
                                            href="{{ url('pages') }}/{{ $popular->id }}"> <img
                                                src="{{ url('item_img') }}/{{ $b }}" alt="">
                                        </a>
                                    @endforeach

                                    <div class="entry-header entry-info">
                                        <span class="entry-category">{{ $popular->cname }}</span>
                                        <h2 class="entry-title"><a
                                                href="{{ url('pages') }}/{{ $popular->id }}">{{ $popular->title }}
                                            </a></h2>
                                        <div class="entry-meta"><span class="entry-author mi"><span
                                                    class="sp">by</span><span class="author-name">Felicity
                                                    Yoga</span></span><span class="entry-time mi"><span
                                                    class="sp">-</span><time
                                                    class="published">{{ \Carbon\Carbon::parse($popular->created_at)->format('M d ,Y') }}</time></span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach

                        </div>
                    </div>

                    <div class="widget PopularPosts" data-version="2" id="PopularPosts2">
                        <div class="widget-title title-wrap">
                            <h3 class="title">Latest Posts</h3>
                        </div>
                        <div class="widget-content default-items">

                            @foreach ($data->take(7) as $post)
                                <div class="default-item item-1">
                                    @php $a = explode(",",$post->item_img); @endphp
                                    @foreach ($a as $b)
                                        <a class="entry-image-wrap is-image"
                                            href="{{ url('pages') }}/{{ $post->id }}"><img
                                                src="{{ url('item_img') }}/{{ $b }}" alt="">
                                        </a>
                                    @endforeach
                                    <div class="entry-header">
                                        <h2 class="entry-title"><a
                                                href="{{ url('pages') }}/{{ $post->id }}">{{ $post->title }}</a>
                                        </h2>
                                        <div class="entry-meta"><span class="entry-time mi"><time
                                                    class="published">{{ \Carbon\Carbon::parse($post->created_at)->format('M d ,Y') }}</time></span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="widget Label" data-version="2" id="Label2">
                        <div class="widget-title title-wrap">
                            <h3 class="title">Main Tags</h3>
                        </div>
                        <div class="widget-content cloud-label">
                            <ul class="cloud-style">

                                <?php $cat = App\Category::get(); ?>
                                @foreach ($cat as $category)
                                    <li><a class="label-name btn"
                                            href="{{ url('product') }}/{{ $category->cname }}">{{ $category->cname }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="widget ReportAbuse" data-version="2" id="ReportAbuse1">
                        <h3 class="title">
                            <a class="report_abuse" href="https://www.blogger.com/go/report-abuse" rel="noopener nofollow"
                                target="_blank">
                                Report Abuse
                            </a>
                        </h3>
                    </div>
                    <div class="widget FeaturedPost" data-version="2" id="FeaturedPost1">
                        <div class="widget-content">
                            <script async="async" data-ad-client="ca-app-pub-3940256099942544/6300978111"
                                                        src="{{ URL::asset('assests/client/pagead2.googlesyndication.com/pagead/js/f.txt') }}">
                            </script>
                        </div>
                    </div>
                    <!-- <div class="widget BlogSearch" data-version="2" id="BlogSearch1">
                                                                                                                                                                                                                                                                                                                                                <div class="widget-content search-widget">
                                                                                                                                                                                                                                                                                                                                                    <form action="http://www.FelicityYoga.in/search" class="search-form" target="_top">
                                                                                                                                                                                                                                                                                                                                                        <input ariby="Search This Blog" autocomplete="off" class="search-input" name="q" placeholder="Search This Blog" type="search" value="">
                                                                                                                                                                                                                                                                                                                                                        <button class="search-action btn" type="submit" value=""></button>
                                                                                                                                                                                                                                                                                                                                                    </form>
                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                            </div> -->


                    <div class="widget PageList" data-version="2" id="PageList1">
                        <div class="widget-title title-wrap">
                            <h3 class="title">MAIN MENU</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="list-style">
                                <!-- <li>
                                                                                                                                                                                                                                                                                                                                                            <a href="http://www.FelicityYoga.in/search/label/जीवन शैली">जीवन शैली</a>
                                                                                                                                                                                                                                                                                                                                                        </li> -->
                                <li>
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ url('contact') }}">Contact Us</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> --}}

@endsection
