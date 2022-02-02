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
			<div class="col-12 col-sm-6">
				<div class="card">
					<div class="card-header">
						<div class="d-flex justify-content-between align-items-center">
							<h3 class="card-title">View cao</h3>
							<a href={{ route("post.index") }}>Toàn bộ</a>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body p-0">
						<table class="table table-striped">
							<thead>
								<tr>
									<th style="width: 10px">#</th>
									<th>Task</th>
									<th style="width: 40px">Label</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($posts as $index => $item)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $item["title"] }}</td>
									<td><span class="badge bg-danger">55%</span></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
			</div>

			<div class="col-12 col-sm-6">
				<div class="card">
					<div class="card-header">
						<div class="d-flex justify-content-between align-items-center">
							<h3 class="card-title">Yêu thích</h3>
							<a href={{ route('post.favorite') }}>Toàn bộ</a>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body p-0">
						<table class="table table-striped">
							<thead>
								<tr>
									<th style="width: 10px">#</th>
									<th>Task</th>
									<th style="width: 40px">Label</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($favorites as $index => $item)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $item["title"] }}</td>
									<td><span class="badge bg-danger">55%</span></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-sm-6">
				<div class="card">
					<div class="card-header">
						<div class="d-flex justify-content-between align-items-center">
							<h3 class="card-title">Riêng tư</h3>
							<a href={{ route("post.hiding") }}>Toàn bộ</a>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body p-0">
						<table class="table table-striped">
							<thead>
								<tr>
									<th style="width: 10px">#</th>
									<th>Task</th>
									<th style="width: 40px">Label</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($hiddens as $index => $item)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $item["title"] }}</td>
									<td><span class="badge bg-danger">55%</span></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
			</div>

			<div class="col-12 col-sm-6">
				<div class="card">
					<div class="card-header">
						<div class="d-flex justify-content-between align-items-center">
							<h3 class="card-title">Công khai</h3>
							<a href={{ route("post.publish") }}>Toàn bộ</a>
						</div>
					</div>
					<!-- /.card-header -->
					<div class="card-body p-0">
						<table class="table table-striped">
							<thead>
								<tr>
									<th style="width: 10px">#</th>
									<th>Task</th>
									<th style="width: 40px">Label</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($publishes as $index => $item)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $item["title"] }}</td>
									<td><span class="badge bg-danger">55%</span></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
			</div>
		</div>
		<!-- /.card -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection