@php
$page='Chi tiết';
$title=$post->title;
$sub='Detail';
@endphp
@extends('layouts/manager/layouts')
@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">{{ $post->title }}</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
				<i class="fas fa-minus"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
				<i class="fas fa-times"></i>
			</button>
		</div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-12 col-md-12 col-lg-9 order-2 order-md-1">
				<div class="row">
					<div class="col-sm-8">
						<div class="row">
							<div class="col-12 col-sm-3">
								<div class="info-box bg-light">
									<div class="info-box-content">
										<span class="info-box-text text-center text-muted">Danh mục</span>
										<span class="info-box-number text-center text-muted mb-0">{{ $post->category->name }}</span>
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-3">
								<div class="info-box bg-light">
									<div class="info-box-content">
										<span class="info-box-text text-center text-muted">Tags</span>
										@if (count($post->tags) > 0)
										@foreach ($post->tags as $item)
										<span class="info-box-number text-center text-muted mb-0">{{ $item->name }}</span>
										@endforeach
										@else
										<span class="info-box-number text-center text-muted mb-0">#</span>
										@endif
									</div>
								</div>
							</div>
							<div class="col-12 col-sm-6">
								<div class="info-box bg-light">
									<div class="info-box-content">
										<span class="info-box-text text-center text-muted">Miêu tả</span>
										<span class="info-box-number text-center text-muted mb-0">{{ $post->description }}</span>
									</div>
								</div>
							</div>
						</div>

						<div class="content">
							{!! $post->content !!}
						</div>

						<div class="row">
							@foreach ($post->subContent as $item)
							<div class="col-12 col-sm-4">
								<img src={{ asset($item->image_dir) }} alt={{ $item->description }}>
								{{ $item->description }}
							</div>
							@endforeach
						</div>
					</div>
					<div class="col-sm-4">
						<div class="thumbnail">
							@isset($post->thumb_img)
							<img src={{ asset($post->thumb_img) }} alt="">
							@else
							Không có ảnh thumb
							@endisset
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-3 order-1 order-md-2">
				<h3 class="text-primary"><i class="fas fa-paint-brush"></i> Thông tin bài viết</h3>
				<br>
				<div class="text-muted">
					<div class="row">
						<div class="col-sm-6">
							<p class="text-sm">Người viết
								<b class="d-block">Nguyễn Thị Thanh Ngọc</b>
							</p>
						</div>
						<div class="col-sm-6">
							<p class="text-sm">Ngày công khai
								<b class="d-block">{{ date("d-m-Y", strtotime($post->published_at)) }}</b>
							</p>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<p class="text-sm">Ngày viết
								<b class="d-block">{{ date("d-m-Y", strtotime($post->created_at)) }}</b>
							</p>
						</div>
						<div class="col-sm-6">
							<p class="text-sm">Ngày chỉnh sửa
								<b class="d-block">{{ date("d-m-Y", strtotime($post->updated_at)) }}</b>
							</p>
						</div>
					</div>
				</div>

				<h5 class="mt-2 text-muted">Dữ liệu</h5>
				<div class="row">
					<div class="col-sm-6">
						<p class="text-sm">Trạng thái
							<b class="d-block">{{ ($post->publish == "0") ? "Riêng tư" : "Công khai" }}</b>
						</p>
					</div>
					<div class="col-sm-6">
						<p class="text-sm">Yêu thích
							<b class="d-block">{{ ($post->favorite == "0") ? "Không" : "Yêu thích" }}</b>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<p class="text-sm">Lượt xem
							<b class="d-block">30 lượt</b>
						</p>
					</div>
					<div class="col-sm-6">
						<p class="text-sm">Gì đó
							<b class="d-block"></b>
						</p>
					</div>
				</div>

				<div class="text-center mt-5 mb-3">
					<a href="#" class="btn btn-sm btn-primary">Chỉnh sửa</a>
					<a href="#" class="btn btn-sm btn-warning">Xóa</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /.card-body -->
</div>
@endsection