@extends('layouts.app')

@section('meta_title' , $blog->title)
@section('meta_description' , $blog->meta_description)
@section('meta_keywords' , $blog->meta_tags)

@section('content')
    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-title-area" style="margin-bottom: -30px">
                            <ol class="breadcrumb hidden-xs-down">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript:;">Blog</a></li>
                                <li class="breadcrumb-item active">
                                    {{ strip_tags( $blog->title) }}
                                </li>
                            </ol>

                            <span class="color-aqua"><a href="{{route('category.show' , Crypt::encrypt($blog->category->id))}}"
                                    title="">{{ $blog->category->name }}</a></span>

                            {!! $blog->title !!}

                            <div class="blog-meta big-meta">
                                <small><a href="javascript:;"
                                        title="">{{ Carbon\Carbon::parse($blog->published_at)->format('d M ,Y') }}</a></small>
                                <small><a href="{{url()->current()}}#about_author" title="">by {{ env('AUTHOR_NAME') }}</a></small>
                                <small><a href="javascript:;" title=""><i class="fa fa-eye"></i>
                                        {{ $blog->view_count }}</a></small>
                            </div><!-- end meta -->

                            <div class="post-sharing">
                                <ul class="list-inline">
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                            target="_blank" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i>
                                            <span class="down-mobile">Share on Facebook</span></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text=Check%20out%20this%20amazing%20post!"
                                            target="_blank" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i>
                                            <span class="down-mobile">Tweet on Twitter</span></a></li>
                                </ul>
                            </div><!-- end post-sharing -->
                        </div><!-- end title -->

                        <div class="single-post-media">
                            {{-- <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->image_alt }}"
                                class="img-fluid"> --}}
                        </div><!-- end media -->

                        <div class="blog-content">
                            <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->image_alt }}"
                                class="img-fluid img-fullwidth">
                            <div class="pp">
                                @php
                                    // Add CSS to img tags inside the description
                                    $description = preg_replace(
                                        '/<img(.*?)>/i',
                                        '<img$1 style="width: 100%; object-fit: contain; height: 100%;">',
                                        $blog->description,
                                    );
                                @endphp
                                {!! $description !!}
                            </div><!-- end pp -->
                        </div><!-- end content -->

                        <div class="blog-title-area">
                            <div class="tag-cloud-single">
                                <span>Tags</span>
                                @foreach (explode(',', $blog->tags) as $tag)
                                    <small>
                                        <a href="javascript:;" title="{{ trim($tag) }}">{{ trim($tag) }}</a>
                                    </small>
                                @endforeach
                            </div><!-- end meta -->

                            <div class="post-sharing">
                                <ul class="list-inline">
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                            target="_blank" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i>
                                            <span class="down-mobile">Share on Facebook</span></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text=Check%20out%20this%20amazing%20post!"
                                            target="_blank" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i>
                                            <span class="down-mobile">Tweet on Twitter</span></a></li>
                                </ul>
                            </div>
                        </div><!-- end title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <h2>Ad Banner</h2>
                                    </div><!-- end banner-img -->
                                </div><!-- end banner -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="invis1" id="about_author">

                        <div class="custombox authorbox clearfix" >
                            <h4 class="small-title">About author</h4>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    {{-- <img src="upload/author.jpg" alt="" class="img-fluid rounded-circle"> --}}
                                </div><!-- end col -->

                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <h4><a href="javascript:;">{{env('AUTHOR_NAME')}}</a></h4>
                                    <p>Quisque sed tristique felis. Lorem <a href="{{env('APP_URL')}}">visit my website</a> amet,
                                        consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus
                                        odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Cloapedia!</p>

                                    <div class="topsocial">
                                        <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Facebook"><i class="fa fa-facebook"></i></a>
                                        <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Youtube"><i class="fa fa-youtube"></i></a>
                                        <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                        <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Instagram"><i class="fa fa-instagram"></i></a>
                                        <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="Website"><i class="fa fa-link"></i></a>
                                    </div><!-- end social -->

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end author-box -->

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">You may also like</h4>
                            <div class="row">
                                @foreach ($blog->category->blogs as $index => $blog)
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="{{ route('blog.show', $blog->slug) }}"
                                                    title="{{ strip_tags($blog->title) }}">
                                                    <img src="{{ Storage::url($blog->image) }}"
                                                        alt="{{ $blog->image_alt }}" class="img-fluid">
                                                    <div class="hovereffect">
                                                        {{-- <span class=""></span> --}}
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4><a href="{{ route('blog.show', $blog->slug) }}"
                                                        title="">{{ strip_tags($blog->title) }}</a></h4>
                                                <small><a href="{{route('category.show' , Crypt::encrypt($blog->category_id))}}"
                                                        title="">{{ $blog->category->name }}</a></small>
                                                <small><a href="{{route('category.show' , Crypt::encrypt($blog->category_id))}}"
                                                        title="">{{ Carbon\Carbon::parse($blog->published_at)->format('d M , Y') }}</a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                    @if ($index == 1)
                                    @break
                                @endif
                            @endforeach
                        </div><!-- end row -->
                    </div><!-- end custom-box -->

                    <hr class="invis1">

                    {{-- <div class="custombox clearfix">
                        <h4 class="small-title">3 Comments</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="comments-list">
                                    <div class="media">
                                        <a class="media-left" href="javascript:;">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading user_name">Amanda Martines <small>5 days
                                                    ago</small></h4>
                                            <p>Exercitation photo booth stumptown tote bag Banksy, elit small batch
                                                freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit
                                                kale chips proident chillwave deep v laborum. Aliquip veniam delectus,
                                                Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone
                                                Kickstarter, drinking vinegar jean.</p>
                                            <a href="javascript:;" class="btn btn-primary btn-sm">Reply</a>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <a class="media-left" href="javascript:;">
                                        </a>
                                        <div class="media-body">

                                            <h4 class="media-heading user_name">Baltej Singh <small>5 days ago</small>
                                            </h4>

                                            <p>Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo
                                                biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko
                                                tempor duis single-origin coffee. Banksy, elit small.</p>

                                            <a href="javascript:;" class="btn btn-primary btn-sm">Reply</a>
                                        </div>
                                    </div>
                                    <div class="media last-child">
                                        <a class="media-left" href="javascript:;">
                                        </a>
                                        <div class="media-body">

                                            <h4 class="media-heading user_name">Marie Johnson <small>5 days ago</small>
                                            </h4>
                                            <p>Kickstarter seitan retro. Drinking vinegar stumptown yr pop-up artisan
                                                sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie
                                                consequat flexitarian four loko tempor duis single-origin coffee.
                                                Banksy, elit small.</p>

                                            <a href="javascript:;" class="btn btn-primary btn-sm">Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end custom-box --> --}}

                    <hr class="invis1">

                    {{-- <div class="custombox clearfix">
                        <h4 class="small-title">Leave a Reply</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-wrapper">
                                    <input type="text" class="form-control" placeholder="Your name">
                                    <input type="text" class="form-control" placeholder="Email address">
                                    <input type="text" class="form-control" placeholder="Website">
                                    <textarea class="form-control" placeholder="Your comment"></textarea>
                                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                </div><!-- end page-wrapper -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <h2 class="widget-title">Search</h2>
                        <form class="form-inline search-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Coming Soon">
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </form>
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Recent Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                @foreach (App\Services\DefaultService::recentBlogs() as $blog)
                                <a href="{{route('blog.show' , $blog->slug)}}"
                                    class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{Storage::url($blog->image)}}" alt="{{$blog->image_alt}}"
                                            class="img-fluid float-left">
                                        <h5 class="mb-1">{{$blog->title}}</h5>
                                        <small>{{Carbon\Carbon::parse($blog->published_at)->format('d M , Y')}}</small>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Advertising</h2>
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                {{-- <img src="upload/banner_03.jpg" alt="" class="img-fluid"> --}}
                                Ad will be here
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end widget -->

                    @include('partials.popular-categories')

                </div><!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
