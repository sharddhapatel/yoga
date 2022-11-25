@extends('Client.header_footer')
@section('title')
    Posted Page
@endsection
@section('body')


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
                                            <p class="entry-excerpt excerpt">{{ Str::limit($image->description, 100) }}
                                            </p>
                                            <div class="entry-meta">
                                                <span class="entry-author mi"><span class="by sp">by</span><span
                                                        class="author-name">Felicity Yoga</span></span>
                                                <span class="entry-time mi"><span class="sp">-</span><time
                                                        class="published">{{ \Carbon\Carbon::parse($image->created_at)->format('M d ,Y') }}</time></span>
                                            </div>

                                        </div>
                                    </article>

                                </div>
                            @endforeach
                            <div class="pagination-bar text-center" style="float: right;">
                                <nav aria-label="Page navigation " class="d-inline-b">
                                    <ul class="pagination" role="navigation">
                                        <li class="page-item active">
                                            {{ $data->appends(\Request::except('_token'))->render() }}</li>
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
                            <script async="async" data-ad-client="ca-pub-7992862911707391"
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
                                        <div class=" entry-meta"><span class="entry-author mi"><span
                                                    class="sp">by</span><span class="author-name">Felicity
                                                    Yoga</span></span><span class="entry-time mi"><span
                                                    class="sp">-</span><time
                                                    class="published">{{ \Carbon\Carbon::parse($popular->created_at)->format('M d ,Y') }}</time></span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            @endforeach


                            <?php $cat = App\Category::with(['product'])
                                ->get()
                                ->sortByDesc('created_at'); ?>

                            @foreach ($cat as $data)
                                @foreach ($data->product->take(2) as $data1)
                                    @php $a = explode(",",$data1->item_img); @endphp
                                    @foreach ($a as $b)
                                        <div class="default-item item-1">
                                            <a class="entry-image-wrap is-image"
                                                href="{{ url('pages') }}/{{ $data1->id }}"><img
                                                    src="{{ url('item_img') }}/{{ $b }}" alt="">
                                            </a>
                                    @endforeach
                                    <div class="entry-header">
                                        <h2 class="entry-title"><a
                                                href="{{ url('pages') }}/{{ $data1->id }}">{{ $data1->title }}</a>
                                        </h2>
                                        <div class="entry-meta"><span class="entry-time mi"><time
                                                    class="published">{{ \Carbon\Carbon::parse($data1->created_at)->format('M d ,Y') }}</time></span>
                                        </div>
                                    </div>
                        </div>
                        @endforeach
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
                        <!-- <div class="featured-post card-style post">
                                                                                                                                                                                                                                                                            <a class="entry-image-wrap before-mask is-image" href="blog-post_22.html" title="आप कल जो थे उससे हमेशा ज्यादा बड़े हो | "><span class="entry-thumb" data-image="https://1.bp.blogspot.com/-fp4fIbu8fc0/YFhGn2pJD0I/AAAAAAAAAGQ/7xkwI2WWyf0-bAuPFo6ako6V9rK8WoRswCLcBGAsYHQ/w72-h72-p-k-no-nu/bade.jpg"></span>
                                                                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                                                                            <div class="entry-header entry-info">
                                                                                                                                                                                                                                                                                <span class="entry-category">जीवन शैली</span>
                                                                                                                                                                                                                                                                                <h2 class="entry-title"><a href="blog-post_22.html" title="आप कल जो थे उससे हमेशा ज्यादा बड़े हो | ">आप कल जो थे उससे हमेशा ज्यादा बड़े हो | </a></h2>
                                                                                                                                                                                                                                                                                <div class="entry-meta"><span class="entry-author mi"><span class="sp">by</span><span class="author-name">Felicity Yoga</span></span><span class="entry-time mi"><span class="sp">-</span><time class="published" datetime="2021-03-22T12:57:00+05:30">March 22, 2021</time></span>
                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                        </div> -->
                    </div>
                </div>

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
@endsection
