@php
$page='Chi tiết danh mục';
$active="category";
$page="setting";
$sub = $category->name;
$detail="Category";
$link='category.index';
@endphp
@extends('layouts/manager/layouts')
@section('content')
<div class="card">
	<div class="card-header">
		<h3 class="card-title">{{ $category->name }}</h3>

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
						Miêu tả
					</th>
					<th style="width: 50px">
						View
					</th>
					<th style="width: 110px" class="text-center">
						Trạng thái
					</th>
					<th style="width: 170px" class="text-center">
						Cài đặt
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($category->getPost as $index => $item)
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
						{{ $item->description }}
					</td>
					<td class="project_progress">
						<span class="badge badge-info">
							10
						</span>
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
							View
						</a>
						<a class="btn btn-info btn-sm" href={{ route("post.edit", ["id"=> $item->id]) }}>
							<i class="fas fa-pencil-alt">
							</i>
							Edit
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection