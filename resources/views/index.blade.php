@extends('layouts/guest/layouts')
@section('content')
<!-- Main -->
<div id="main">
    <!-- Intro -->
    <section id="intro">
        <a href={{ route('guest.index') }} class="logo"><img src={{ asset('guest/images/logo.jpg') }} alt="" /></a>
        <header>
            <h2>Của để dành</h2>
            <p>Và đây là miêu tả về trang web</p>
        </header>
    </section>

    @if (count($favorites) > 0)
        @foreach ($favorites as $item)
            <article class="post">
                <header>
                    <div class="title">
                        <h2><a href={{ route('guest.show', ['slug'=> $item->slug]) }}>{{ $item->title }}</a></h2>
                        <p>{{ $item->description }}</p>
                    </div>
                    <div class="meta">
                        <time class="published" datetime="{{ date('d-m-y', strtotime($item->published_at)) }}">{{ date('d-m-y', strtotime($item->published_at)) }}</time>
                        <a href="#" class="author"><span class="name">Ngọc Nguyễn</span><img src={{ asset('guest/images/avatar.jpg') }} alt=""></a>
                    </div>
                </header>
                <a href={{ route('guest.show', ['slug'=> $item->slug]) }} class="image featured">
                    @if ($item->thumb_img)
                    <img src={{ asset($item->thumb_img) }} alt="">
                    @else
                    <img src="images/pic01.jpg" alt="">
                    @endif
                </a>
                <p>
            
                </p>
                <footer>
                    <ul class="actions">
                        <li><a href={{ route('guest.show', ['slug'=> $item->slug]) }} class="button large">Continue Reading</a></li>
                    </ul>
                    <ul class="stats">
                        <li><a href="#">{{ $item->category->name }}</a></li>
                        <li><a href="#" class="icon solid fa-heart">28</a></li>
                        <li><a href="#" class="icon solid fa-comment">128</a></li>
                    </ul>
                </footer>
            </article>
        @endforeach
    @else
        <p>Chưa có bài viết</p>
    @endif

</div>

<!-- Sidebar -->
<section id="sidebar">


    <!-- Mini Posts -->
    <section>
        <div class="mini-posts">
            <!-- Mini Post -->
            @if (count($posts) > 0)
                @foreach($posts as $item)
                    <article class="mini-post">
                        <header>
                            <h3><a href={{ route('guest.show', ['slug' => $item->slug]) }}>{{ $item->title }}</a></h3>
                            <time class="published" datetime={{ date('d-m-Y', strtotime($item->published_at)) }}>{{ date('d-m-Y', strtotime($item->published_at)) }}</time>
                            <a href="#" class="author"><img src="images/avatar.jpg" alt="" /></a>
                        </header>
                        <a href={{ route('guest.show', ['slug'=> $item->slug]) }} class="image">
                            @if($item->thumb_img)
                                <img src={{ asset($item->thumb_img) }} alt="" />
                            @else
                                <img src={{ asset('guest/images/pic04.jpg') }} alt="" />
                            @endif
                        </a>
                    </article>
                @endforeach
            @else
                <p>Chưa có bài viết</p>
            @endif
        </div>
    </section>

    <!-- Posts List -->
    <section>
        <ul class="posts">
            @if (cout($random_post) > 0)
                @foreach($random_post as $item)
                    <li>
                        <article>
                            <header>
                                <h3><a href={{ route('guest.show', ['slug'=> $item->slug]) }}>{{ $item->title }}</a></h3>
                                <time class="published" datetime={{ date('d-m-Y', strtotime($item->published_at)) }}>{{ date('d-m-Y', strtotime($item->published_at)) }}</time>
                            </header>
                            <a href={{ route('guest.show', ['slug'=> $item->slug]) }} class="image">
                                @if($item->thumb_img)
                                    <img src={{ asset($item->thumb_img) }} alt="" />
                                @else
                                    <img src={{ asset('guest/images/pic08.jpg') }} alt="" />
                                @endif
                            </a>
                        </article>
                    </li>
                @endforeach
            @else
                <p>Chưa có bài viết</p>
            @endif
        </ul>
    </section>

    <!-- About -->
    <section class="blurb">
        <h2>Giới thiệu chút</h2>
        <p>
            Tôi là Ngọc Nguyễn :)
        </p>
        <ul class="actions">
            <li><a href="#" class="button">Liên hệ cho tôi</a></li>
        </ul>
    </section>

    <!-- Footer -->
    <section id="footer">
        <ul class="icons">
            <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
            <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
        </ul>
    </section>

</section>
@endsection
