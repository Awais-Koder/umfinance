@extends('layouts.app')

@section('content')
<div class="page-title wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><img src="{{ Storage::url($category->image) }}" alt="" style="width: 50px;height: 50px;border-radius:50%;object-fit: cover;"> {{ $category->name }}
                </h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Blog</a></li>
                    <li class="breadcrumb-item active">{{ $category->name }}</li>
                </ol>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">

                    <div class="portfolio row isotope d-flex flex-wrap justify-content-center"
                        style="position: relative;">
                        @foreach ($CatBlogs as $CatBlog)
                        <div class="pitem item-w1 item-h1 isotope-item d-flex justify-content-center flex-wrap"
                            style="width: 380px; height: 375px;">

                            <div class="blog-box">
                                <div class="post-media">
                                    <a href="{{route('blog.show' , $CatBlog->slug)}}" title="">
                                        <img src="{{Storage::url($CatBlog->image)}}" alt="{{$CatBlog->iamge_alt}}"
                                            class="img-fluid">
                                        <div class="hovereffect">
                                            {{-- <span></span> --}}
                                        </div><!-- end hover -->
                                    </a>
                                </div><!-- end media -->
                                <div class="blog-meta">
                                    <span class="bg-grey"><a
                                            href="{{route('category.show' , Crypt::encrypt($category->id))}}"
                                            title="">{{$category->name}}</a></span>
                                    <h4><a href="{{route('blog.show' , $CatBlog->slug)}}"
                                            title="">{{$CatBlog->title}}</a>
                                    </h4>
                                    <small><a href="javascript:;" title="">By: {{env('AUTHOR_NAME')}}</a></small>
                                    <small><a href="{{route('category.show' , Crypt::encrypt($category->id))}}"
                                            title="">{{Carbon\Carbon::parse($CatBlog->published_at)->format('d M ,
                                            Y')}}</a></small>
                                </div><!-- end meta -->

                            </div><!-- end blog-box -->
                        </div><!-- end col -->
                        @endforeach
                    </div><!-- end portfolio -->
                </div><!-- end page-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->
        <div class="col-md-12 d-flex">
            {{ $CatBlogs->links('vendor.pagination.bootstrap-5') }}
        </div>
    </div><!-- end container -->
</section>
@endsection
