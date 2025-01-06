@extends('layouts.app')

@section('meta_title' , $seo->title)
@section('meta_description' , $seo->meta_description)
@section('meta_keywords' , $seo->meta_keywords)
@section('cononical_url' , $seo->canonical_url)
@section('og_title' , $seo->og_title)
@section('og_description' , $seo->og_description)
@section('og_image', $seo->og_image ? Storage::url($seo->og_image) : asset('default-image-path.jpg'))


@section('content')
    <section class="section first-section">
        <div class="container-fluid">
            <div class="masonry-blog clearfix">

                @forelse ($featureBlogs as $index => $blog)
                    @if ($index == 0)
                        <!-- Left-side featured article -->
                        <div class="left-side">
                            <div class="masonry-box post-media">
                                <img src="{{ Storage::url($blog->image) }}" alt="{{$blog->image_alt}}" class="img-fluid"
                                    style="height: 359px;object-fit: cover">
                                <div class="shadoweffect">
                                    <div class="shadow-desc">
                                        <div class="blog-meta">
                                            <span class="bg-aqua">
                                                <a href="{{route('category.show' , Crypt::encrypt($blog->category_id))}}"
                                                    title="{{ $blog->category->name }}">{{ $blog->category->name }}</a>
                                            </span>
                                            <div>
                                                <h4 style="color: white !important">
                                                    <a href="{{route('blog.show' , $blog->slug)}}" title=""
                                                        class="article-title">{{ strip_tags($blog->title) }}</a>
                                                </h4>
                                            </div>
                                            <small><a href="{{route('blog.show' , $blog->slug)}}"
                                                    title="{{ Carbon\Carbon::parse($blog->published_at)->format('D M , Y') }}">{{ Carbon\Carbon::parse($blog->published_at)->format('d M , Y') }}</a></small>
                                            <small><a href="blog-author.html"
                                                    title="">{{ env('AUTHOR_NAME') }}</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end shadow-desc -->
                                </div><!-- end shadow -->
                            </div><!-- end post-media -->
                        </div>
                    @elseif($index == 1)
                        <!-- Center-side main article with two smaller articles inside -->
                        <div class="center-side">
                            <div class="masonry-box post-media">
                                <img src="{{ Storage::url($blog->image) }}" alt="{{$blog->image_alt}}" class="img-fluid"
                                    style="height: 200px;object-fit: cover">
                                <div class="shadoweffect">
                                    <div class="shadow-desc">
                                        <div class="blog-meta">
                                            <span class="bg-green"><a href="{{route('category.show' , Crypt::encrypt($blog->category_id))}}"
                                                    title="">{{ $blog->category->name }}</a></span>
                                            <h4 class="article-title"><a href="{{route('blog.show' , $blog->slug)}}"
                                                    title="">{{ strip_tags($blog->title) }}</a>
                                            </h4>
                                            <small><a href="{{route('blog.show' , $blog->slug)}}"
                                                    title="">{{ Carbon\Carbon::parse($blog->published_at)->format('d M , Y') }}</a></small>
                                            <small><a href="blog-author.html"
                                                    title="">{{ env('AUTHOR_NAME') }}</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end shadow-desc -->
                                </div><!-- end shadow -->
                            </div>

                            <!-- Grouped smaller boxes -->

                            @foreach ($featureBlogs as $innerIndex => $innerBlog)
                                @if ($innerIndex == 2)
                                    <div class="masonry-box small-box post-media" style="height: 158px">
                                        <img src="{{ Storage::url($innerBlog->image) }}" alt="{{$innerBlog->image_alt}}" class="img-fluid"
                                            style="height: 158px;object-fit: cover">
                                        <div class="shadoweffect">
                                            <div class="shadow-desc">
                                                <div class="blog-meta">
                                                    <span class="bg-green"><a href="{{route('category.show' , Crypt::encrypt($innerBlog->category_id))}}"
                                                            title="">{{ $innerBlog->category->name }}</a></span>
                                                    <h4 class="article-title"><a href="{{route('blog.show' , $innerBlog->slug)}}"
                                                            title="">{{ strip_tags($blog->title) }}</a></h4>
                                                </div><!-- end meta -->
                                            </div><!-- end shadow-desc -->
                                        </div><!-- end shadow -->
                                    </div>
                                @elseif($innerIndex == 3)
                                    <div class="masonry-box small-box post-media" style="height: 158px">
                                        <img src="{{ Storage::url($innerBlog->image) }}" alt="{{$innerBlog->image_alt}}" class="img-fluid"
                                            style="height: 158px;object-fit: cover">
                                        <div class="shadoweffect">
                                            <div class="shadow-desc">
                                                <div class="blog-meta">
                                                    <span class="bg-green"><a href="{{route('category.show' , Crypt::encrypt($innerBlog->category_id))}}"
                                                            title="">{{ $innerBlog->category->name }}</a></span>
                                                    <h4 class="article-title"><a href="{{route('blog.show' , $innerBlog->slug)}}"
                                                            title="">{{ strip_tags($blog->title) }}</a></h4>
                                                </div><!-- end meta -->
                                            </div><!-- end shadow-desc -->
                                        </div><!-- end shadow -->
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @elseif($index === 4)
                        <!-- Right-side article -->
                        <div class="right-side hidden-md-down">
                            <div class="masonry-box post-media">
                                <img src="{{ Storage::url($innerBlog->image) }}" alt="{{ $innerBlog->image_alt }}" class="img-fluid"
                                    style="height: 359px;object-fit: cover">
                                <div class="shadoweffect">
                                    <div class="shadow-desc">
                                        <div class="blog-meta">
                                            <span class="bg-aqua"><a href="{{route('category.show' , Crypt::encrypt($innerBlog->category_id))}}"
                                                    title="">{{ $innerBlog->category->name }}</a></span>
                                            <h4 class="article-title"><a href="{{route('blog.show' , $innerBlog->slug)}}"
                                                    title="">{{ strip_tags($innerBlog->title) }}</a>
                                            </h4>
                                            <small><a href="{{route('blog.show' , $innerBlog->slug)}}"
                                                    title="">{{ Carbon\Carbon::parse($innerBlog->published_at)->format('d M , Y') }}</a></small>
                                            <small><a href="blog-author.html"
                                                    title="">{{ env('AUTHOR_NAME') }}</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end shadow-desc -->
                                </div><!-- end shadow -->
                            </div>
                        </div>
                    @endif
                    @empty
                        <p class="text-center">No blogs found.</p>
                @endforelse
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $blogIndex => $blog)
                    @if ($blogIndex == 0)
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="section-title">
                                <h3 class="color-aqua">
                                    <a href="{{route('category.show' , Crypt::encrypt($blog->category_id))}}" title="">{{ $blog->category->name }}</a>
                                </h3>
                            </div><!-- end title -->

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="blog-box">
                                        <div class="post-media">
                                            <a href="{{route('blog.show' , $blog->slug)}}" title="">
                                                <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->image_alt }}"
                                                    class="img-fluid" style="height: 378px;object-fit: cover">
                                                <div class="hovereffect">

                                                </div><!-- end hover -->
                                            </a>
                                        </div><!-- end media -->
                                        <div class="blog-meta big-meta">
                                            <h4><a href="{{route('blog.show' , $blog->slug)}}"
                                                    title="">{{ Str::limit($blog->title, 150) }}</a>
                                            </h4>
                                            <p>{{ Str::limit($blog->description, 70) }}</p>
                                            <small><a href="{{route('category.show' , Crypt::encrypt($blog->category_id))}}"
                                                    title="">{{ $blog->category->name }}</a></small>
                                            <small><a href="{{route('blog.show' , $blog->slug)}}"
                                                    title="">{{ Carbon\Carbon::parse($blog->published_at)->format('d M , Y') }}</a></small>
                                            <small><a href="blog-author.html" title="">by
                                                    {{ env('AUTHOR_NAME') }}</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->

                                    <hr class="invis">
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end col -->
                    @endif
                @endforeach

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="section-title">
                        @if(!empty($blog))
                        <h3 class="color-pink"><a href="{{route('category.show' , Crypt::encrypt($blog->category_id))}}"
                                title="">{{ $blog->category->name }}</a></h3>
                        @endif
                    </div>
                    <div class="row">
                        @foreach ($blogs->skip(1)->take(2) as $blog)
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="{{route('blog.show' , $blog->slug)}}" title="">
                                            <img src="{{ Storage::url($blog->image) }}" alt="{{$blog->image}}" class="img-fluid"
                                                style="height: 378px;object-fit: cover">
                                            <div class="hovereffect">
                                                {{-- <span></span> --}}
                                            </div><!-- end hover -->
                                        </a>
                                    </div><!-- end media -->
                                    <div class="blog-meta">
                                        <h4><a href="{{route('blog.show' , $blog->slug)}}" title="">{{ $blog->title }}</a></h4>
                                        <small><a href="{{route('category.show' , Crypt::encrypt($blog->category_id))}}"
                                                title="">{{ $blog->category->name }}</a></small>
                                        <small><a href="{{route('category.show' , Crypt::encrypt($blog->category_id))}}"
                                                title="">{{ Carbon\Carbon::parse($blog->published_at)->format('d M , Y') }}</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->

                                <hr class="invis">
                            </div><!-- end col -->
                        @endforeach
                    </div><!-- end row -->
                </div><!-- end col -->
            </div>

            <hr class="invis1">

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="banner-spot clearfix">
                        <div class="banner-img">
                            <img src="assets/upload/banner_01.jpg" alt="" class="img-fluid">
                        </div><!-- end banner-img -->
                    </div><!-- end banner -->
                </div><!-- end col -->
            </div><!-- end row -->

            <hr class="invis1">

            <div class="row">
                @foreach ($otherBlogs as $otherBlogIndex => $otherBlog)
                @if($otherBlogIndex % 2 == 0)
                    <div class="col-lg-9">
                        <div class="blog-list clearfix">
                            <div class="section-title">
                                <h3 class="color-green"><a href="{{route('category.show' , Crypt::encrypt($otherBlog->category_id))}}" title="">{{$otherBlog->category->name}}</a>
                                </h3>
                            </div><!-- end title -->

                            <div class="blog-box row">
                                <div class="col-md-4">
                                    <div class="post-media">
                                        <a href="{{route('blog.show' , $otherBlog->slug)}}" title="">
                                            <img src="{{Storage::url($otherBlog->image)}}" alt="{{$otherBlog->image_alt}}" class="img-fluid">
                                            <div class="hovereffect"></div>
                                        </a>
                                    </div><!-- end media -->
                                </div><!-- end col -->

                                <div class="blog-meta big-meta col-md-8">
                                    <h4><a href="{{route('blog.show' , $otherBlog->slug)}}" title="">{{$otherBlog->title}}</a></h4>
                                    <p>{{Str::limit($otherBlog->description , 150)}}</p>
                                    <small><a href="{{route('category.show' , Crypt::encrypt($otherBlog->category_id))}}" title="">{{$otherBlog->category->name}}</a></small>
                                    <small><a href="{{route('blog.show' , $otherBlog->slug)}}" title="">{{ Carbon\Carbon::parse($blog->published_at)->format('d M , Y') }}</a></small>
                                    <small><a href="blog-author.html" title="">by {{env('AUTHOR_NAME')}}</a></small>
                                </div><!-- end meta -->
                            </div><!-- end blog-box -->

                            <hr class="invis">

                        </div><!-- end blog-list -->

                        <hr class="invis">
                    </div>
                @else
                    <div class="col-lg-3">
                        <div class="section-title">
                            <h3 class="color-yellow"><a href="{{route('category.show' , Crypt::encrypt($otherBlog->category_id))}}" title="">{{$otherBlog->category->name}}</a></h3>
                        </div><!-- end title -->

                        <div class="blog-box">
                            <div class="post-media">
                                <a href="{{route('blog.show' , $otherBlog->slug)}}" title="">
                                    <img src="{{Storage::url($otherBlog->image)}}" alt="{{$otherBlog->image_alt}}" class="img-fluid">
                                    <div class="hovereffect">
                                        {{-- <span class="videohover"></span> --}}
                                    </div><!-- end hover -->
                                </a>
                            </div><!-- end media -->
                            <div class="blog-meta">
                                <h4><a href="{{route('blog.show' , $otherBlog->slug)}}" title="">{{$otherBlog->title}}</a>
                                </h4>
                                <small><a href="{{route('category.show' , Crypt::encrypt($otherBlog->category_id))}}" title="">{{$otherBlog->category->name}}</a></small>
                                <small><a href="{{route('category.show' , Crypt::encrypt($otherBlog->category_id))}}" title="">{{ Carbon\Carbon::parse($blog->published_at)->format('d M , Y') }}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">
                    </div>
                @endif
                @endforeach
            </div><!-- end row -->

            <hr class="invis1">

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="banner-spot clearfix">
                        <div class="banner-img">
                            <img src="assets/upload/banner_02.jpg" alt="" class="img-fluid">
                        </div><!-- end banner-img -->
                    </div><!-- end banner -->
                </div><!-- end col -->
            </div><!-- end row -->
            <div class="col-md-12 d-flex">
                {{ $otherBlogs->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div><!-- end container -->
    </section>
@endsection
