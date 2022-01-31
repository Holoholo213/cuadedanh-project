@php
$page='create';
$title='Tạo bài viết';
$sub='Tạo bài viết';
@endphp
@extends('layouts/manager/layouts')
@section('content')
<form action={{ route("post.store") }} method="POST">
	@csrf
	<div class="card-body">
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="title">Tiêu đề</label>
					<input type="text" class="form-control" id="title" placeholder="Tiêu đề" name="title">
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label>Danh mục</label>
					<select class="custom-select" name="category_id">
						<option disabled selected>Chọn danh mục</option>
						@foreach($categories as $item)
						<option value={{ $item->id }}> {{ $item->name }} </option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" id="publish" value="true" name="publish">
						<label class="custom-control-label" for="publish">Công khai</label>
					</div>
				</div>
				<div class="form-group">
					<div class="custom-control custom-switch">
						<input type="checkbox" class="custom-control-input" id="favorite" value="true" name="favorite">
						<label class="custom-control-label" for="favorite">Yêu thích</label>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="description">Miêu tả</label>
			<input type="text" class="form-control" id="description" placeholder="Miêu tả" name="description">
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="form-group">
					<label for="thumb_img">Thumb Image</label>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="thumb_img" name="thumb_img">
							<label class="custom-file-label" for="thumb_img">Chọn ảnh</label>
						</div>
						<div class="input-group-append">
							<span class="input-group-text">Tải</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
					<label>Ngày công khai</label>

					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
						</div>
						<input type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" name="published_at">
					</div>
					<!-- /.input group -->
				</div>
			</div>
		</div>

		<div class="form-group">
			<textarea id="summernote" placeholder="Nội dung" name="content"></textarea>
		</div>

		<div class="center-text">
			<button type="submit" class="btn btn-primary">Đăng bài</button>
		</div>
	</div>
	<!-- /.card-body -->
</form>
@endsection

@section('script')
<!-- Summernote -->
<script src={{ asset('manager/plugins/summernote/summernote-bs4.min.js') }}></script>
<script>
	$(function(){
		$('#summernote').summernote()
	})
</script>
@endsection