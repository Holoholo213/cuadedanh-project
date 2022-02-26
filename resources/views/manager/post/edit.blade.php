@php
    $page='Sửa bài';
    $title='Sửa bài viết';
    $sub='Sửa bài';
@endphp
@extends('layouts/manager/layouts')
@section('content')
<form action={{ route("post.update", ["id" => $post->id]) }} method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" class="form-control @error(" title") is-invalid @enderror" id="title" placeholder="Tiêu đề" name="title" value="{{ $post->title }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Danh mục</label>
                    <select class="custom-select @error(" category_id") is-invalid @enderror" name="category_id">
                        @foreach($categories as $item)
                            <option value={{ $item->id }} {{ $post->category_id === $item->id ? "selected" : "" }}> {{ $item->name }} </option>
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

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="description">Miêu tả</label>
                    <input type="text" class="form-control" id="description" placeholder="Miêu tả" name="description">
                </div>

                <div class="form-group">
                    <label>Ngày công khai</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric" name="published_at">
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="keyword">Từ khóa</label>
                    <input type="text" class="form-control" id="keyword" placeholder="Miêu tả" name="keyword">
                </div>
            </div>
        </div>

        <div class="row mb-4">
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
                <div class="showImg">
                    <span id="preview">
                        Chưa có ảnh thumb
                    </span>
                </div>
            </div>
        </div>

        @foreach ($post->subContent as $item)
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Nội dung</h3>
                <input type="hidden" name="new_content[]" value="{{ $item->id }}">
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="inputDescription">Project Description</label>
                    <textarea id="inputDescription" class="form-control summernote" rows="4" name="content[]">{!! $item->content !!}</textarea>
                </div>

                <div class="form-group">
                    <label for="img_dir">Ảnh</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" id="img_dir" name="img_dir[]">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div id="addContent">

        </div>

        <button type="button" id="addContentButton" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Thêm nội dung</button>

        <div class="mt-5">
            <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
        </div>
    </div>
</form>
@endsection
@section('script')
<!-- Summernote -->
<script src={{ asset('manager/plugins/summernote/summernote-bs4.min.js') }}></script>
<script src={{ asset("js/addTag.js") }}></script>
<script src={{ asset("js/addContent.js") }}></script>
<script>
    $(document).ready(function () {
        $('.summernote').summernote();
    });
</script>
@endsection
