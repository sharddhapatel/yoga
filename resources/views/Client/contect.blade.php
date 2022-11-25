@extends('Client.header_footer')
@section('title')
    Show User
@endsection
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

            <main id="main-wrapper">
                <div class="main section" id="main" name="Main Posts">
                    <div class="widget Blog" data-version="2" id="Blog1">
                        <div class="blog-posts-wrap">

                            <div class="queryMessage">
                                <span class="query-info query-success">
                                    <h1>Contact Us</h1>
                                </span>
                            </div>

                            <form action="{{ url('addcontact') }}" method="post" style="padding:25px;margin-top: 50px;">
                                {{ csrf_field() }}

                                <h3 style="font-size: 20px;">Let’s get on</h3><br>
                                <input type="text" id="name" name="name" placeholder="Name"
                                    style="width: 250px;height: 30px;border: 2px solid #1d8211;border-radius: 4px;color: #000000;margin-bottom: 10px;padding-left: 10px;"><br>
                                <input type="text" id="email" name="email" placeholder="Email"
                                    style="width: 250px;height: 30px;border: 2px solid #1d8211;border-radius: 4px;color: #000000;margin-bottom: 10px;padding-left: 10px;"><br>
                                <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message"
                                    style=" width: 250px;height: 100px;border: 2px solid #1d8211;border-radius: 4px;color: #000000;margin-bottom: 10px;padding-left: 10px; "></textarea>
                                <br>

                                <div class="form-group row">
                                    <div class="offset-sm-0 col-sm-10">
                                        <button type="submit" class="btn btn-success">Send Message</button> <button
                                            type="reset" class="btn btn-danger">Cancel</button>
                                    </div>
                                </div>
                            </form>

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

                    <!-- <div class="widget PopularPosts" data-version="2" id="PopularPosts2">
                                <div class="widget-title title-wrap">
                                    <h3 class="title">Popular Posts</h3>
                                </div>
                                <div class="widget-content default-items">
                                @foreach ($product as $popular)
                                    <div class="default-item card-style item-0">
                                    @php $a = explode(",",$popular->item_img); @endphp
                                             @foreach ($a as $b)
                                        <a class="entry-image-wrap before-mask is-image" href="http://www.felicityyoga.in/2021/02/7.html" > <img src="{{ url('item_img') }}/{{ $b }}" alt="">
                                        </a>@endforeach
                                        
                                        <div class="entry-header entry-info">
                                            <span class="entry-category">{{ $popular->cname }}</span>
                                            <h2 class="entry-title"><a href="{{ url('pages') }}/{{ $popular->id }}">{{ $popular->title }} </a></h2>
                                            <div class="entry-meta"><span class="entry-author mi"><span class="sp">by</span><span class="author-name">Felicity Yoga</span></span><span class="entry-time mi"><span class="sp">-</span><time class="published" >{{ \Carbon\Carbon::parse($popular->created_at)->format('M d ,Y') }}</time></span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                  
                                  
                                </div>
                            </div> -->
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
                    <!-- <div class="widget BlogSearch" data-version="2" id="BlogSearch1">
                                <div class="widget-content search-widget">
                                    <form action="http://www.felicityyoga.in/search" class="search-form" target="_top">
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
                                            <a href="http://www.felicityyoga.in/search/label/जीवन शैली">जीवन शैली</a>
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
