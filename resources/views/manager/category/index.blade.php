@php
$page='setting';
$active='category';
$title='Quản lý danh mục';
$sub='Danh mục';
@endphp
@extends('layouts/manager/layouts')
@section('content')

<!-- Main content -->
<div class="content">
	<!-- Container-fluid -->
	<div class="container-fluid">
		<div style="max-width: 1020px; margin: 0 auto">
			<div class="row">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Danh sách danh mục</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body p-0">
							<table class="table table-sm">
								<thead>
									<tr>
										<th style="width: 50px">#</th>
										<th>Tên</th>
										<th>slug</th>
										<th style="width: 100px" class="text-center">Trang</th>
										<th style="width: 65px;" class="text-center">Chi tiết</th>
										<th style="width: 40px;" class="text-center">Sửa</th>
										<th style="width: 40px;" class="text-center">Xóa</th>
									</tr>
								</thead>
								<tbody>
									@foreach($categories as $index => $item)
									<tr>
										<td>{{ $index+1 }}</td>
										<td id={{ $item->id }}>{{ $item->name }}</td>
										<td>
											{{ $item->slug }}
										</td>
										<td class="text-center"><span class="badge bg-danger">{{ count($item->getPost) }}</span></td>
										<td class="text-center">
											<a href={{ route("category.detail", ["id"=> $item->id, "slug" => $item->slug]) }}>
												<i class="fas fa-hand-point-right"></i>
											</a>
										</td>
										<td class="text-center">
											<button class="btn btn-sm" onclick="getId({{ $item->id }})" type='button' data-toggle="modal" data-target="#modal-default">
												<i class="fas fa-pen-square"></i>
											</button>
										</td>
										<td>
											<form action="{{ route('category.destroy', $item->id) }}" method="POST">
												@csrf
												@method('delete')
												@if (count($item->getPost) > 0)
												<button type="submit" class="btn btn-sm disabled" disabled>
													<i class="fas fa-trash-alt"></i>
												</button>
												@else
												<button type="submit" class="btn btn-sm">
													<i class="fas fa-trash-alt"></i>
												</button>
												@endif
											</form>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
				</div>
				<div class="col-md-4">
					<div class="card card-primary">
						<div class="card-header">
							<h4 class="card-title">Thêm danh mục</h4>
						</div>
						<div class="card-body">
							<form action={{ route('category.store') }} method="POST">
								@csrf
								<div class="form-group">
									<input type="text" class="form-control form-control-border" id="name" placeholder="Tên danh mục" name="name">
								</div>
								<button type="submit" class="btn btn-block btn-outline-primary" style="max-width: 100px">Thêm</button>
							</form>
						</div>
					</div>
				</div>

				<div class="modal fade" id="modal-default">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Sửa danh mục</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form id="edit_form" method="POST">
								@csrf
								@method("PUT")
								<div class="modal-body">
									@csrf
									<div class="form-group">
										<input type="text" class="form-control form-control-border" id="edit_name" name="name">
									</div>
								</div>
								<div class="modal-footer justify-content-between">
									<button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
									<button type="submit" class="btn btn-primary">Lưu lại</button>
								</div>
							</form>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /Main content -->
@endsection

@section('script')
<script>
	function getId(id) {
        var name = document.getElementById(id).textContent;
		document.getElementById('edit_name').value = name;
		var edit_form = document.getElementById('edit_form');
		if(id){
			var cat_id = id
		} else {
			var cat_id = 1
		}
		edit_form.setAttribute('action', `{{ url('/manager/category/update/${id}') }}`)
    }
</script>
@endsection