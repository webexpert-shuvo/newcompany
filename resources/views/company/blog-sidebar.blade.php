<div class="col-lg-4">

    <div class="sidebar" data-aos="fade-left">

      <h3 class="sidebar-title">Search</h3>
      <div class="sidebar-item search-form">
        <form action="{{ route('show.blog.search') }}" method="POST">
            @csrf
          <input type="text" name="search">
          <button type="submit"><i class="icofont-search"></i></button>
        </form>

      </div><!-- End sidebar search formn-->

      <h3 class="sidebar-title">Categories</h3>
      <div class="sidebar-item categories">
        <ul>
            @php

                $allcate = App\Models\Category::where('status','Active')->latest()->get();

            @endphp
            @foreach ($allcate as $cats)
                <li><a href="{{ route('blog.category.search' , $cats -> slug) }}">{{ $cats -> name }} ({{$cats -> post -> count()}})</a></li>
            @endforeach
        </ul>

      </div><!-- End sidebar categories-->

      <h3 class="sidebar-title">Recent Posts</h3>
      <div class="sidebar-item recent-posts">

        @php
            $allposts  = App\Models\Post::where('status','Active')->latest()->take(5)->get();
        @endphp

        @foreach ( $allposts as $post)
            <div class="post-item clearfix">
                <img src="{{ URL::to('') }}/backend/assets/img/post/{{ $post -> image -> imagename }}" alt="">
                <h4><a href="blog-single.html">{{  $post -> name }}</a></h4>
                <time datetime="2020-01-01">{{ date('D-M-Y' , strtotime($post -> created_at)  ) }}</time>
            </div>
        @endforeach

      </div><!-- End sidebar recent posts-->

      <h3 class="sidebar-title">Tags</h3>
      <div class="sidebar-item tags">
        <ul>

            @php
                $alltags = App\Models\Tag::where('status','Active')->latest()->get();
            @endphp

            @foreach ($alltags as $tags)
                <li><a href="#">{{ $tags -> name }}</a></li>
            @endforeach


        </ul>

      </div><!-- End sidebar tags-->

    </div><!-- End sidebar -->

  </div>
