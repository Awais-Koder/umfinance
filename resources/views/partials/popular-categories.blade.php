<div class="widget">
    <h2 class="widget-title">Popular Categories</h2>
    <div class="link-widget">
        <ul>
            @foreach (App\Services\DefaultService::getPopularCategories() as $category)
                <li><a href="javascript:;">{{$category->name}} <span>({{$category->blogs->count()}})</span></a></li>
            @endforeach
        </ul>
    </div><!-- end link-widget -->
</div><!-- end widget -->
