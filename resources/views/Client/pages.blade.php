@extends('Client.header_footer')
@section('title')
    Pages
@endsection
@section('body')


    <div class="flex-center" id="content-wrapper">
        <div class="container row-x1">

            <main id='main-wrapper'>
                <div class='main section' id='main' name='Main Posts'>
                    <div class='widget Blog' data-version='2' id='Blog1'>
                        <div class='blog-posts hfeed item-post-wrap'>
                            <article class='blog-post hentry item-post'>
                                {{-- <script type='application/ld+json'>
                                    {
                                        "@context": "https://schema.org",
                                        "@type": "NewsArticle",
                                        "mainEntityOfPage": {
                                            "@type": "WebPage",
                                            "@id": "http://www.yoyolady.in/2021/03/"
                                        },
                                        "headline": "आप कल ज&#2379; थ&#2375; उसस&#2375; हम&#2375;श&#2366; ज&#2381;य&#2366;द&#2366; बड&#2364;&#2375; ह&#2379; | ",
                                        "description": "क&#2381;य&#2366; आप व&#2367;श&#2381;व&#2366;स करत&#2375; ह&#2375; ? क&#2368; आप कल ज&#2379; थ&#2375; उसस&#2375; हम&#2375;श&#2366; ज&#2381;य&#2366;द&#2366; बड&#2364;&#2375; ह&#2379; |&#160; क&#2381;य&#2379;&#2306;क&#2367; आप शक&#2381;त&#2367; बन ज&#2366;ए&#2306;ग&#2375; आदर&#2381;श बन ज&#2366;ए&#2306;ग&#2375; ब&#2369;द&#2381;ध&#2367; बन ज&#2366;ए&#2306;ग&#2375;| प&#2381;र&#2375;म और ...",
                                        "datePublished": "2021-03-22T12:57:00+05:30",
                                        "dateModified": "2021-03-22T12:57:34+05:30",
                                        "image": {
                                            "@type": "ImageObject",
                                            "url": "https://1.bp.blogspot.com/-fp4fIbu8fc0/YFhGn2pJD0I/AAAAAAAAAGQ/7xkwI2WWyf0-bAuPFo6ako6V9rK8WoRswCLcBGAsYHQ/w1200-h675-p-k-no-nu/bade.jpg",
                                            "height": 675,
                                            "width": 1200
                                        },
                                        "author": {
                                            "@type": "Person",
                                            "name": "Felicity Yoga"
                                        },
                                        "publisher": {
                                            "@type": "Organization",
                                            "name": "Blogger",
                                            "logo": {
                                                "@type": "ImageObject",
                                                "url": "https://lh3.googleusercontent.com/ULB6iBuCeTVvSjjjU1A-O8e9ZpVba6uvyhtiWRti_rBAs9yMYOFBujxriJRZ-A=h60",
                                                "width": 206,
                                                "height": 60
                                            }
                                        }
                                    }
                                </script> --}}
                                @foreach ($data as $image)
                                    <div class='item-post-inner'>
                                        <div class='entry-header blog-entry-header has-meta'>
                                            {{-- <em class='delimiter'></em><span><strong>{{$image->title}}</strong></span> --}}
                                            <nav id='breadcrumb'><a class='home' href="{{ url('/') }}">Home</a><em
                                                    class='delimiter'></em><a class='label'
                                                    href='{{ url('product') }}/{{ $image->cname }}'>{{ $image->cname }}</a>
                                            </nav>
                                            <br>
                                            <script type='application/ld+json'>
                                                {
                                                    "@context": "http://schema.org",
                                                    "@type": "BreadcrumbList",
                                                    "itemListElement": [{
                                                        "@type": "ListItem",
                                                        "position": 1,
                                                        "name": "Home",
                                                        "item": "http://www.yoyolady.in/"
                                                    }, {
                                                        "@type": "ListItem",
                                                        "position": 2,
                                                        "name": "ज&#2368;वन श&#2376;ल&#2368;",
                                                        "item": "http://www.yoyolady.in/search/label/%E0%A4%9C%E0%A5%80%E0%A4%B5%E0%A4%A8%20%E0%A4%B6%E0%A5%88%E0%A4%B2%E0%A5%80"
                                                    }, {
                                                        "@type": "ListItem",
                                                        "position": 3,
                                                        "name": "आप कल ज&#2379; थ&#2375; उसस&#2375; हम&#2375;श&#2366; ज&#2381;य&#2366;द&#2366; बड&#2364;&#2375; ह&#2379; | ",
                                                        "item": "http://www.yoyolady.in/2021/03/"
                                                    }]
                                                }
                                            </script>
                                            <h1 class='entry-title'>{{ $image->title }}</h1>
                                            <div class='entry-meta'>
                                                <div class='align-left'>
                                                    <span class='entry-author mi'>
                                                        <img src="{{ URL::asset('assests/client/logo/user.png') }}"
                                                            style="width:20px;">
                                                    </span>
                                                    <span class='by sp'>by</span><span class='author-name'>Felicity
                                                        Yoga</span></span>
                                                    <span class='entry-time mi'><span class='sp'>-</span><time
                                                            class='published'
                                                            datetime='2021-03-22T12:57:00+05:30'>{{ \Carbon\Carbon::parse($image->created_at)->format('M d ,Y') }}</time></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='entry-content-wrap'>
                                            <div class='post-body entry-content' id='post-body'>
                                                <div class="separator" style="clear: both; text-align: center;">
                                                    @php $a = explode(",",$image->item_img); @endphp
                                                    @foreach ($a as $b)
                                                        <a href="{{ url('pages') }}/{{ $image->id }}"><img
                                                                src="{{ url('item_img') }}/{{ $b }}"
                                                                alt=""></a>
                                                    @endforeach
                                                </div>
                                                <br>
                                                <p><span
                                                        style="background-color: #fdffff; font-family: Droid Serif, serif; font-size: 18px;">
                                                        <p style="font-size: 18px;">{!! nl2br($image->description) !!}</p>
                                                    </span>
                                                </p>
                                                <br>
                                                @foreach ($pdetail as $productd)
                                                    <br>
                                                    <b style="font-size: 18px;">
                                                        <p class="entry-excerpt excerpt">
                                                            {{ $productd->ptitle }}</p>
                                                    </b>

                                                    <div class="separator" style="clear: both; text-align: center;">
                                                        <img src="{{ url('pimage') }}/{{ $productd->pimage }}" alt=""
                                                            width="600px" height="200px">

                                                    </div>
                                                    <p class="entry-excerpt excerpt" style="font-size: 18px;">
                                                        {!! nl2br($productd->des) !!}
                                                    </p>
                                                @endforeach



                                            </div>
                                            <!-- <div class='entry-labels'>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <span class='labels-label'>Tags:</span>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <a class='label-link' href='http://www.yoyolady.in/search/label/जीवन शैली' rel='tag'>ज&#2368;वन श&#2376;ल&#2368;</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <a class='label-link' href='http://www.yoyolady.in/search/label/मानसिक तस्वीर' rel='tag'>म&#2366;नस&#2367;क तस&#2381;व&#2368;र</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                <a class='label-link' href='http://www.yoyolady.in/search/label/रिश्तों' rel='tag'>र&#2367;श&#2381;त&#2379;&#2306;</a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                            </div> -->


                                        </div>

                                        <div class='post-share'>
                                            <ul class='gnews-free-share-links social social-bg'>
                                                <li class='facebook has-span'><a class='facebook btn window-ify'
                                                        data-height='500'
                                                        data-url='https://www.facebook.com/sharer.php?u=http://www.yoyolady.in/2021/03/blog-post_22.html'
                                                        data-width='520' href='javascript:;' rel='nofollow'
                                                        title='Facebook'><span>Facebook</span></a></li>
                                                <li class='twitter has-span'><a class='twitter btn window-ify'
                                                        data-height='520'
                                                        data-url='https://twitter.com/intent/tweet?url=http://www.yoyolady.in/2021/03/blog-post_22.html&text=आप कल जो थे उससे हमेशा ज्यादा बड़े हो | '
                                                        data-width='860' href='javascript:;' rel='nofollow'
                                                        title='Twitter'><span>Twitter</span></a></li>
                                                <li class='whatsapp'>
                                                    <a class='whatsapp btn window-ify' data-height='520'
                                                        data-url='https://api.whatsapp.com/send?text=आप कल जो थे उससे हमेशा ज्यादा बड़े हो |  | http://www.yoyolady.in/2021/03/blog-post_22.html'
                                                        data-width='860' href='javascript:;' rel='nofollow'
                                                        title='WhatsApp'></a>
                                                </li>
                                                <li class='pinterest-p'>
                                                    <a class='pinterest btn window-ify' data-height='520'
                                                        data-url='https://www.pinterest.com/pin/create/button/?url=http://www.yoyolady.in/2021/03/blog-post_22.html&media=https://1.bp.blogspot.com/-fp4fIbu8fc0/YFhGn2pJD0I/AAAAAAAAAGQ/7xkwI2WWyf0-bAuPFo6ako6V9rK8WoRswCLcBGAsYHQ/s320/bade.jpg&description=आप कल जो थे उससे हमेशा ज्यादा बड़े हो | '
                                                        data-width='860' href='javascript:;' rel='nofollow'
                                                        title='Pinterest'></a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                @endforeach
                            </article>

                        </div>


                        <script type='text/javascript'>
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
                <div class='section' id='gnews-free-related-posts' name='Related Posts'>
                    <div class='widget HTML' data-shortcode='$title={You might like} $results={3}' data-version='2'
                        id='HTML101'>
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
                                // ->take(3)
                                // ->orderBy('created_at', 'DESC')
                                ->get()
                                ->sortByDesc('created_at'); ?>

                            @foreach ($cat as $data)
                                @foreach ($data->product->take(2) as $data1)
                                    @php $a = explode(",",$data1->item_img); @endphp
                                    @foreach ($a as $b)
                                        <div class="default-item item-1">
                                            <a class="entry-image-wrap is-image"
                                                href="{{ url('pages') }}/{{ $data1->id }}"
                                                title="{{ $data1->title }}"><img
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
