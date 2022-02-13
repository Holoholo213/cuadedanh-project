@php
$page='Quản lý';
$active='dashboard';
$title='Dashboard';
@endphp
@extends('layouts/manager/layouts')
@section('content')

<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			@foreach ($categories as $item)
			@if (count($item->getPost) > 0)
			<div class="col-12 col-sm-6">
				<div class="card">
					<div class="card-header">
						<div class="d-flex justify-content-between align-items-center">
							<h3 class="card-title">{{ $item->name }}</h3>
							<a href={{ route("category.detail", ["id"=> $item->id, "slug" => $item->slug]) }}>Toàn bộ</a>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body p-0">
						<table class="table table-striped">
							<thead>
								<tr>
									<th style="width: 10px">#</th>
									<th style="width: 150px;">Tiêu đề</th>
									<th>Miêu tả</th>
									<th style="width: 100px" class="text-center">Lượt xem</th>
									<th style="width: 100px"></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($item->getPost as $index => $post)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $post->title }}</td>
									<td>{{ $post->description }}</td>
									<td class="text-center"><span class="badge bg-danger">55%</span></td>
									<td>
										<a class="btn btn-primary btn-sm" href={{ route("post.detail", ["id"=> $post->id, "slug" => $post->slug]) }}>
											<i class="fas fa-eye">
											</i>
											Xem
										</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
			</div>
			@endif
			@endforeach
		</div>
		<!-- /.card -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection