@php
$page='page_manager';
$active='post';
$title='Toàn bộ bài viết';
$sub='posts';
@endphp
@extends('layouts/manager/layouts')
@section('content')
<div class="card">
	<div class="card-header">
		<div class="d-flex align-items-center">
			<div class="card-title mr-4">Tìm kiếm</div>
			<div>
				<form action={{ route("post.index") }} method="GET">
					<div class="d-flex justify-content-between align-items-center">
						<div class="d-flex justify-content-between align-items-center">
							<div class="form-group mb-0 mr-3">
								<input type="text" class="form-control" id="search" name="title" placeholder="Tiêu đề">
							</div>
							<div class="custom-control custom-checkbox mr-3">
								<input class="custom-control-input checkboxCheck" type="checkbox" id="publish" value="1">
								<label for="publish" class="custom-control-label">Công khai</label>
							</div>
							<div class="custom-control custom-checkbox mr-3">
								<input class="custom-control-input custom-control-input-danger checkboxCheck" type="checkbox" id="not_publish" value="0">
								<label for="not_publish" class="custom-control-label">Riêng tư</label>
							</div>
							<div class="form-group mb-0 mr-3">
								<div class="custom-control custom-switch">
									<input type="checkbox" class="custom-control-input" id="favorite" value="true" name="favorite">
									<label class="custom-control-label" for="favorite">Yêu thích</label>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-sm">Tìm kiếm</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="card">
	<div class="card-header">
		<h3 class="card-title">Bài viết</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
				<i class="fas fa-minus"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
				<i class="fas fa-times"></i>
			</button>
		</div>
	</div>
	<div class="card-body p-0">
		<table class="table table-striped projects">
			<thead>
				<tr>
					<th style="width: 10px">
						#
					</th>
					<th style="width: 100px">
						Tiêu đề
					</th>
					<th>
						Nội dung
					</th>
					<th style="width: 50px">
						View
					</th>
					<th style="width: 40px" class="text-center">
						Status
					</th>
					<th style="width: 160px" class="text-center">
						Setting
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($posts as $index => $item)
				<tr>
					<td>
						{{ $index+1 }}
					</td>
					<td>
						<a>
							{{ $item->title }}
						</a>
					</td>
					<td>
						{!! Str::limit($item->content, 70) !!}
					</td>
					<td class="project_progress text-center">
						10
					</td>
					<td class="project-state">
						@if ($item->publish == 0)
						<span class="badge badge-warning">
							Riêng tư
						</span>
						@else
						<span class="badge badge-success">
							Công khai
						</span>
						@endif
					</td>
					<td class="project-actions text-right">
						<a class="btn btn-primary btn-sm" href={{ route("post.detail", ["id"=> $item->id, "slug" => $item->slug]) }}>
							<i class="fas fa-eye">
							</i>
							Xem
						</a>
						<a class="btn btn-info btn-sm" href={{ route("post.edit", ["id" => $item->id]) }}>
							<i class="fas fa-pencil-alt">
							</i>
							Sửa
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('script')
<script>
	$(".checkboxCheck").click(function(){
		var value = $(this).val()
		if($(this).is(":checked")){
			$(".checkboxCheck").prop("checked", false);
			$(this).prop("checked", true);
		}
	})
</script>
@endsection