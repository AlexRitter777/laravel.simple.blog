<ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="marketing-index.html">Home</a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle " role="button" data-toggle="dropdown" aria-expanded="false" href="#">Categories</a>
        @if($categories->count())
        <div class="dropdown-menu">
            @foreach($categories as $category)
            <a class="dropdown-item" href="#">{{$category->title}}</a>
            @endforeach
        </div>
        @endif
    </li>
    <li class="nav-item">
        <a class="nav-link" href="marketing-category.html">Articles</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="marketing-blog.html">Contact Us</a>
    </li>
</ul>
