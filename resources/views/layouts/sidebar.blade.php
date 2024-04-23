<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
    <div class="sidebar">
        <div class="widget">
            <h2 class="widget-title">Popular Posts</h2>
            <div class="blog-list-widget">
                <div class="list-group">
                    @foreach($posts as $post)
                    <a href="{{route('article.show', ['slug' => $post->slug])}}" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="w-100 justify-content-between">
                            <img src="assets/front/upload/small_07.jpg" alt="" class="img-fluid float-left">
                            <h5 class="mb-1">{{$post->title}}</h5>
                            <small>{{$post->getPostDate()}}</small> |
                            <i class="fa fa-eye"></i>
                            <small>{{$post->views}}</small>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div><!-- end blog-list -->
        </div><!-- end widget -->


        <div class="widget">
            <h2 class="widget-title">Categories</h2>
            <div class="link-widget">
                <ul>
                    @foreach($categories as $category)
                    <li><a href="{{route('category.show', ['slug' => $category->slug])}}">{{$category->title}} <span>({{$category->posts_count}})</span></a></li>
                    @endforeach
                </ul>
            </div><!-- end link-widget -->
        </div><!-- end widget -->
    </div><!-- end sidebar -->
</div><!-- end col -->
