@php
$page='Sửa danh mục';
@endphp
@extends('layouts/manager/layouts')
@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title ">Danh sách danh mục</h4>
				<p class="card-category">Danh sách các danh mục đã đăng</p>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead class=" text-primary">
							<tr>
								<th>
									ID
								</th>
								<th>
									Tên danh mục
								</th>
								<th>
									Slug
								</th>
								<th>
									Số lượng bài viết
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($categories as $item)
							<tr>
								<td>
									{{ $item->id }}
								</td>
								<td>
									{{ $item->name }}
								</td>
								<td>
									{{ $item->slug }}
								</td>
								<td>
									1 bài
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header card-header-primary">
				<h4 class="card-title">Thêm danh mục</h4>
				<p class="card-category">Thêm đầu mục phân loại bài viết
				<table></table>
				</p>
			</div>
			<div class="card-body">
				<form action={{ route('category.store') }} method="POST">
					@csrf
					<div class="form-group">
						<label class="bmd-label-floating">Tên danh mục</label>
						<input type="text" class="form-control" name='name'>
					</div>
					<button type="submit" class="btn btn-primary pull-right">Thêm danh mục</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection