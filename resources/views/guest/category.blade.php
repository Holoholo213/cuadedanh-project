@extends('layouts/guest/layouts')
@section('content')
<div id="fh5co-content" class="fh5co-no-pd-top">
	<div class="container">
		<div class="row animate-box fadeInUp animated-fast">
			<div class="col-md-12 col-md-offset-0 text-center fh5co-heading">
				<h2><span>{{ $category->name }}</span></h2>
			</div>
		</div>
		<div class="row">
			<div class="mini-posts">
				<!-- Mini Post -->
				<article class="mini-post">
					<header>
						<h3><a href="http://cuadedanh-project.test/asdf">asdf</a></h3>
						<time class="published" datetime="28-02-2022">28-02-2022</time>
						<a href="#" class="author"><img src="images/avatar.jpg" alt=""></a>
					</header>
					<a href="http://cuadedanh-project.test/asdf" class="image">
						<img src="http://cuadedanh-project.test/guest/images/pic04.jpg" alt="">
					</a>
				</article>
				<article class="mini-post">
					<header>
						<h3><a href="http://cuadedanh-project.test/bai_1">Bài 1</a></h3>
						<time class="published" datetime="01-01-1970">01-01-1970</time>
						<a href="#" class="author"><img src="images/avatar.jpg" alt=""></a>
					</header>
					<a href="http://cuadedanh-project.test/bai_1" class="image">
						<img src="http://cuadedanh-project.test/posts/thumb/1646049915.jpg" alt="">
					</a>
				</article>
				
			</div>
		</div>
	</div>
</div>
@endsection