<!-- Header -->
<header id="header">
	<h1><a href={{ route('guest.index') }}>Của để dành</a></h1>
	<nav class="links">
		<ul>
			<li><a href={{ route('guest.index') }}>Trang chủ</a></li>
			@foreach ($contents as $item)
				<li><a href={{ route('guest.category', ['slug' => $item->slug]) }}>{{ $item->name }}</a></li>
			@endforeach
			<li><a href="#">Về tôi</a></li>
		</ul>
	</nav>
	<nav class="main">
		<ul>
			<li class="search">
				<a class="fa-search" href="#search">Tìm kiếm</a>
				<form id="search" method="get" action="#">
					<input type="text" name="query" placeholder="Search" />
				</form>
			</li>
			<li class="menu">
				<a class="fa-bars" href="#menu">Menu</a>
			</li>
		</ul>
	</nav>
</header>

<!-- Menu -->
<section id="menu">

	<!-- Search -->
	<section>
		<form class="search" method="get" action="#">
			<input type="text" name="query" placeholder="Search" />
		</form>
	</section>

	<!-- Links -->
	<section>
		<ul class="links">
			@foreach ($contents as $item)
			<li>
				<a href={{ route('guest.category', ['slug'=> $item->slug]) }}>
					<h3>{{ $item->name }}</h3>
				</a>
			</li>
			@endforeach
		</ul>
	</section>

	<!-- Actions -->
	{{-- <section>
		<ul class="actions stacked">
			<li><a href="#" class="button large fit">Log In</a></li>
		</ul>
	</section> --}}

</section>