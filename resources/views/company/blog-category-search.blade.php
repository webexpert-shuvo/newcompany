@extends('company.layouts.app')
@section('company-content')


<section id="blog" class="blog">
    <div class="container">

        <div class="row">

        <div class="col-lg-8 entries">


            @foreach ($posts as $post)
                <article class="entry" data-aos="fade-up">

                <div class="entry-img">
                    <img src="{{ URL::to('') }}/backend/assets/img/post/{{ $post -> image ->  imagename }}" alt="" class="img-fluid">
                </div>

                <h2 class="entry-title">
                    <a href="{{ route('show.blog.single' , $post -> slug) }}">{{ $post -> name  }}</a>
                </h2>

                <div class="entry-meta">
                    <ul>
                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="blog-single.html">{{ $post -> user -> name }}</a></li>
                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">{{ date('M-D-Y' , strtotime($post -> created_at)) }}</time></a></li>
                    <li class="d-flex align-items-center"><i class="icofont-comment"></i> <a href="blog-single.html">12 Comments</a></li>
                    <li class="d-flex align-items-center"><i class="icofont-tags"></i>
                        @foreach ($post -> tag as $tags)
                             <a style="margin: 0px 5px ; " href="blog-single.html"> {{ $tags -> name }} </a>
                        @endforeach
                    </li>

                    </ul>
                </div>

                <div class="entry-content">

                    {!!  Str::of(htmlspecialchars_decode($post -> content)) -> words(30) !!}

                    <div class="read-more">
                    <a href="{{ route('show.blog.single' , $post -> slug) }}">Read More</a>
                    </div>
                </div>

                </article>
            @endforeach

                {{-- {{ $posts -> links('company.paginate') }} --}}


        </div>

        <!-- End blog entries list -->

        @include('company.blog-sidebar')

        <!-- End blog sidebar -->

        </div>

    </div>
</section>




@endsection
