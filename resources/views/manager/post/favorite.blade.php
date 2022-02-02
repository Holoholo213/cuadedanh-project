@php
$page='page_manager';
$active='favorite';
$title='Bài yêu thích';
$sub='favorite';
@endphp
@extends('layouts/manager/layouts')
@section('content')
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
					<th style="width: 1%">
						#
					</th>
					<th style="width: 15%">
						Tiêu đề
					</th>
					<th style="width: 45%">
						Nội dung
					</th>
					<th>
						Lượt xem
					</th>
					<th style="width: 8%" class="text-center">
						Status
					</th>
					<th style="width: 20%">
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
						<br>
						<small>
							{{ $item->created_at }}
						</small>
					</td>
					<td>
						{!! Str::limit($item->content, 70) !!}
					</td>
					<td class="project_progress">

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
						<a class="btn btn-primary btn-sm" href={{ route("post.detail", ["id"=> $item->id]) }}>
							<i class="fas fa-folder">
							</i>
							View
						</a>
						<a class="btn btn-info btn-sm" href="#">
							<i class="fas fa-pencil-alt">
							</i>
							Edit
						</a>
						<a class="btn btn-danger btn-sm" href="#">
							<i class="fas fa-trash">
							</i>
							Delete
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection