<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src={{ asset('manager/img/AdminLTELogo.png') }} alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">AdminLTE 3</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src={{ asset('manager/img/user2-160x160.jpg') }} class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Admin</a>
			</div>
		</div>

		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href={{ route('dashboard') }} class="nav-link {{ isset($active) && $active === 'dashboard' ? 'active' : '' }}">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link {{ $page && $page === 'page_manager' ? 'active' : '' }}">
						<i class=" nav-icon fas fa-copy"></i>
						<p>
							Quản lý trang
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href={{ route('post.index') }} class="nav-link {{ isset($active) && $active === 'post' ? 'active' : '' }}">
								<i class="fas fa-list nav-icon"></i>
								<p>Toàn bộ bài viết</p>
							</a>
						</li>
						<li class="nav-item">
							<a href={{ route('post.create') }} class="nav-link {{ isset($active) && $active === 'create' ? 'active' : '' }}">
								<i class="nav-icon fas fa-edit"></i>
								<p>Viết bài</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link {{ $page && $page === 'setting' ? 'active' : '' }}">
						<i class=" nav-icon fas fa-copy"></i>
						<p>
							Cài đặt
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href={{ route('category.index') }} class="nav-link {{ isset($active) && $active === 'category' ? 'active' : '' }}">
								<i class="nav-icon fas fa-th"></i>
								<p>Danh mục</p>
							</a>
						</li>
						<li class="nav-item">
							<a href={{ route('tags.index') }} class="nav-link {{ isset($active) && $active === 'tags' ? 'active' : '' }}">
								<i class="nav-icon fas fa-tags"></i>
								<p>Tags</p>
							</a>
						</li>
						<li class="nav-item">
							<a href={{ route('ingredients.index') }} class="nav-link {{ isset($active) && $active === 'ingredients' ? 'active' : '' }}">
								<i class="nav-icon fas fa-hamburger"></i>
								<p>Nguyên liệu</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href={{ route('media.index') }} class="nav-link {{ isset($active) && $active === 'media' ? 'active' : '' }}">
						<i class="nav-icon far fa-image"></i>
						<p>
							Kho ảnh
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href={{ route('data.index') }} class="nav-link {{ isset($active) && $active === 'data' ? 'active' : '' }}">
						<i class="nav-icon fas fa-chart-pie"></i>
						<p>
							Dữ liệu
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>