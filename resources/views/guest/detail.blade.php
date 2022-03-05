@extends('layouts/guest/layouts')
@section('content')
	<div id="main">
	
		<!-- Post -->
		<article class="post">
			<header>
				<div class="title">
					<h2><a href="#">{{ $post->title }}</a></h2>
					<p>{{ $post->description }}</p>
				</div>
				<div class="meta">
					<time class="published text-center" datetime="{{ date('d-m-y', strtotime($post->published_at)) }}">
						{{ date('d-m-y', strtotime($post->published_at)) }}
					</time>
					<a href="#" class="author">
						<span class="name">Thanh Ngọc</span>
						<img src={{ asset('images/avatar.jpg') }} alt="">
					</a>
				</div>
			</header>
			<span class="image featured">
				@if ($post->thumb_img)
					<img src="{{ asset($post->thumb_img) }}" alt="{{ $post->title }}">
				@endif
			</span>
			@foreach ($post->ingredients as $item)
				{{ $item->name }} - {{ $item->pivot->values }}
			@endforeach
			@foreach ($post->subContent as $item)
				<div class="sub-content" style="margin-bottom: 30px;">
					{!! $item->content !!}
					@if ($item->image_dir)
					<span class="image featured">
						<img src={{ asset($item->image_dir) }} />
					</span>
					@endif
				</div>
			@endforeach

			<footer>
				<ul class="stats">
					<li><a href="#">General</a></li>
					<li><a href="#" class="icon solid fa-heart">28</a></li>
					<li><a href="#" class="icon solid fa-comment">128</a></li>
				</ul>
			</footer>
		</article>
	
	</div>
@endsection