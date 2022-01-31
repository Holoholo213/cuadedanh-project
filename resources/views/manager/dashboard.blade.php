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
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">
					<i class="fas fa-text-width"></i>
					Text Emphasis
				</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				@foreach ($posts as $item)
				<p class="lead">{{ $item->title }}</p>
				@endforeach
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection