@php
$page='page_manager';
$active='create';
$title='Tạo bài viết';
$sub='Tạo bài viết';
@endphp
@extends('layouts/manager/layouts')
@section('content')
<form action={{ route("post.store") }} method="POST" enctype="multipart/form-data">
	@csrf
	<div class="card-body">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="title">Tiêu đề</label>
					<input type="text" class="form-control" id="title" placeholder="Tiêu đề" name="title">
				</div>
			</div>
			<div class="col-md-4">
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
			<div class="col-md-4">
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

		<div class="row" style="margin-bottom: 20px">
			<div class="col-12 col-md-6">
				<div class="d-flex align-items-end">
					<div class="form-group mb-0 mr-3">
						<label for="tag">Tag</label>
						<input type="text" class="form-control" id="tag">
					</div>
					<button class="btn btn-info" id="addTag" type="button">Thêm</button>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group mb-0 mr-3">
					<label for="ingredient">Danh sách tag</label>
				</div>
				<div id="tags"></div>
			</div>
		</div>


		<div class="row" style="margin-bottom: 20px">
			<div class="col-12 col-md-6">
				<div class="d-flex align-items-end">
					<div class="form-group mb-0 mr-3">
						<label for="ingredient">Tên nguyên liệu</label>
						<input type="text" class="form-control" id="ingredient">
					</div>
					<div class="form-group mb-0 mr-3">
						<label for="howmuch">Số lượng</label>
						<input type="text" class="form-control" id="howmuch">
					</div>
					<button class="btn btn-info" id="addIngre" type="button">Thêm</button>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group mb-0 mr-3">
					<label for="ingredient">Danh sách nguyên liệu</label>
				</div>
				<div id="ingredients"></div>
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
							<input type="file" id="thumb_img" name="thumb_img">
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

		<div class="row">
			<div class="col-12 col-sm-6">
				<div class="form-group">
					<label for="sub_thumb">Thêm ảnh</label>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" name="sub_thumb[]" multiple id="gallery-photo-add">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="gallery"></div>

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
		const ingredient_hold = $("#ingredients");
		let ingreId = 1;
		const ingredient_add = function (){
			var ingredient = $("#ingredient");
			var values = $("#howmuch");
			if(ingredient.val() == ""){
				ingredient.addClass("is-invalid")
				return;
			} else {
				ingredient.removeClass("is-invalid")
			}
			if(values.val() == ""){
				values.addClass("is-invalid")
				return;
			} else {
				values.removeClass("is-invalid")
			}
			var ingreInput = $(`<input type='text' id='ingre${ingreId}' name='ingredients[]' value='${ingredient.val()}'' />`)
			var valueInput = $(`<input type='text' id='value${ingreId}' name='values[]' value='${values.val()}' />`)
			var ingreSpan = $(`<div class='ingreSpan' data-id='${ingreId}'><span class='onshow'>${ingredient.val()}</span> <span class='ontop'>${values.val()}</span> </div>`);
			ingreInput.appendTo(ingredient_hold)
			valueInput.appendTo(ingredient_hold)
			ingreSpan.appendTo(ingredient_hold)
			console.log(ingreId)
			ingredient.val('');
			values.val('');
			ingreId += 1;
			$('.ingreSpan').on('click', function(){
				var removeId = $(this).attr("data-id");
				$(`#ingre${removeId}`).remove();
				$(`#value${removeId}`).remove();
				$(this).remove();
			})
		}
		$("#addIngre").on("click",function(){
			ingredient_add();
		})

		const tags = $("#tags");
		let tagId = 1;
		const tag_add = function(){
			var tag = $("#tag");
			if(tag.val() == ""){
				tag.addClass("is-invalid");
				return
			} else {
				tag.removeClass("is-invalid");
			}
			var tagInput = $(`<input type="text" id="tag${tagId}" name="tag[]" value="${tag.val()}" />`)
			var tagContent = $(`<div class="tagContent" data-id="${tagId}">#${tag.val()}</div>`);
			tagInput.appendTo(tags);
			tagContent.appendTo(tags);
			tagId += 1;
			tag.val('')
			
			$(".tagContent").on('click', function(){
				var removeId = $(this).attr("data-id");
				$(`#tag${removeId}`).remove();
				$(this).remove();
			})
		}
		$("#addTag").on("click", function(){
			tag_add();
		})
	})
</script>
<script>
	$(function () {
        $('#summernote').summernote()
    })
    $(function () {
        // Multiple images preview in browser
        var imagesPreview = function (input, gallery) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function (event) {
						var newDiv = $("<div class='items'></div>")
						newDiv.appendTo(gallery)
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(newDiv);
						var description = $("<textarea name='sub_description[]' class='sub-description'></textarea>");
						description.appendTo(newDiv);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function () {
            imagesPreview(this, 'div.gallery');
        });
    });

</script>
@endsection