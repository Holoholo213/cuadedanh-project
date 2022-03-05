@php
    $page='Chi tiết';
    $title=$post->title;
    $sub='Detail';
@endphp
@extends('layouts/manager/layouts')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $post->title }}</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-9 order-2 order-md-1">

                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="thumbnail">
                            @isset($post->thumb_img)
                                <img src={{ asset($post->thumb_img) }} alt="">
                            @else
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    Không có ảnh thumb, <a href="#">Thêm ảnh ?</a>
                                </div>
                            @endisset
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Danh mục</span>
                                <span class="info-box-number text-center text-muted mb-0">{{ $post->category->name }}</span>
                            </div>
                        </div>
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Miêu tả</span>
                                <span class="info-box-numbertext-muted mb-0">{{ $post->description }}</span>
                            </div>
                        </div>
                        <div class="info-box bg-light">
                            <div class="info-box-content">
                                <span class="info-box-text text-center text-muted">Tags</span>
                                @if(count($post->tags) > 0)
                                    <span class="info-box-number text-muted mb-0">
                                        @foreach($post->tags as $item)
                                            #{{ $item->name }}
                                        @endforeach
                                    </span>
                                @else
                                    <span class="info-box-number text-center text-muted mb-0">Không có tag</span>
                                @endif
                            </div>
                        </div>

                        @if(count($post->ingredients) > 0)
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Nguyên liệu</span>
                                    <span class="info-box-number text-muted mb-0">
                                        @foreach($post->ingredients as $item)
                                            {{ $item->name }},
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>

                @foreach ($post->subContent as $item)
                    {!! $item->content !!}
                    @isset($item->image_dir)
                        <div class="mb-3">
                            <img src={{ asset($item->image_dir) }} alt="" class="img-fluid">
                            <small>{{ $item->img_descrip }}</small>
                        </div>
                    @endisset
                @endforeach

            </div>
            <div class="col-12 col-md-12 col-lg-3 order-1 order-md-2">
                <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Thông tin bài viết</h3>
                <br>
                <div class="text-muted">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="text-sm">Người viết
                                <b class="d-block">Nguyễn Thị Thanh Ngọc</b>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-sm">Ngày công khai
                                <b class="d-block">{{ date("d-m-Y", strtotime($post->published_at)) }}</b>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <p class="text-sm">Ngày viết
                                <b class="d-block">{{ date("d-m-Y", strtotime($post->created_at)) }}</b>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-sm">Ngày chỉnh sửa
                                <b class="d-block">{{ date("d-m-Y", strtotime($post->updated_at)) }}</b>
                            </p>
                        </div>
                    </div>
                </div>

                <h5 class="mt-2 text-muted">Dữ liệu</h5>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="text-sm">Trạng thái
                            <b class="d-block">{{ ($post->publish == "0") ? "Riêng tư" : "Công khai" }}</b>
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-sm">Yêu thích
                            <b class="d-block">{{ ($post->favorite == "0") ? "Không" : "Yêu thích" }}</b>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="text-sm">Lượt xem
                            <b class="d-block">30 lượt</b>
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="text-sm">Gì đó
                            <b class="d-block"></b>
                        </p>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-5 mb-3">
                    <a href={{ route("post.edit", ["id" => $post->id]) }} class="btn btn-sm btn-primary mr-3">Chỉnh sửa</a>
                    <form action={{ route("post.destroy", ["id" => $post->id]) }} method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-sm btn-warning">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection
