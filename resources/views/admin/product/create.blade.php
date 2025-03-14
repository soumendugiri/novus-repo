@extends('admin.layouts.app')
@section('title', 'Product')


@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap-datepicker.min.css') }}">
<style type="text/css">
.modal-body {
    position: relative;
    padding: 25px;
}
.modal-content {
    position: relative;
    background-color: #fff;
    border: 1px solid #999;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 6px;
    -webkit-box-shadow: 0 3px 9px rgba(0,0,0,.5);
    box-shadow: 0 3px 9px rgba(0,0,0,.5);
    background-clip: padding-box;
    outline: 0;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
	background-color: #3c8dbc ;
	border: 1px solid #367fa9;
	border-radius: 4px;
	cursor: default;
	float: left;
	margin-right: 5px;
	margin-top: 5px;
	padding: 0 5px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
	color: black;
	cursor: pointer;
	display: inline-block;
	font-weight: bold;
	margin-right: 4px;
}
</style>
@endsection

@section('content')
<!-- Page header -->

<section class="content-header">
	<h1>
		Product
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.dashboardRoute') }}"><i class="fa fa-home"></i> Dashboard</a></li>
		<li><a href="{{ route('admin.products.index') }}">Product</a></li>
		<li class="active">Add Product</li>
	</ol>
</section>
<!-- /.page header -->

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Add Product</h3>

			<div class="box-tools">
				<a href="{{ route('admin.products.index') }}" class="btn btn-info btn-sm btn-flat"><i class="fa fa-list"></i> Manage Products</a>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<form name="product_add_form" class="form-horizontal" action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
					<label for="product_name" class="col-md-2 control-label">Product Name</label>
					<div class="col-md-9">
						<input type="text" name="product_name" class="form-control" id="product_name" value="{{ old('product_name') }}" placeholder="ex: product name">
						@if ($errors->has('product_name'))
						<span class="help-block">
							<strong>{{ $errors->first('product_name') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('product_sku') ? ' has-error' : '' }}">
					<label for="product_sku" class="col-md-2 control-label">Product SKU</label>
					<div class="col-md-9">
						<input type="text" name="product_sku" class="form-control" id="product_sku" value="{{ old('product_sku') }}" placeholder="ex: product-sku">
						@if ($errors->has('product_sku'))
						<span class="help-block">
							<strong>{{ $errors->first('product_sku') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
					<label for="price" class="col-md-2 control-label">Price</label>
					<div class="col-md-5">
						<input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}" placeholder="ex: 100.00">
						@if ($errors->has('price'))
						<span class="help-block">
							<strong>{{ $errors->first('price') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('stock') ? ' has-error' : '' }}">
					<label for="stock" class="col-md-2 control-label">Stock</label>
					<div class="col-md-5">
						<input type="number" name="stock" class="form-control" id="stock" value="{{ old('stock') }}" placeholder="ex: 50">
						@if ($errors->has('stock'))
						<span class="help-block">
							<strong>{{ $errors->first('stock') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
					<label for="category_id" class="col-md-2 control-label">Category</label>
					<div class="col-md-5">
						<select name="category_id" class="form-control" id="category_id">
							<option value="" selected disabled>Select One</option>
							@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->category_name}}</option>
							@endforeach
						</select>
						@if ($errors->has('category_id'))
						<span class="help-block">
							<strong>{{ $errors->first('category_id') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('publication_status') ? ' has-error' : '' }}">
					<label for="publication_status" class="col-md-2 control-label">Publication Status</label>
					<div class="col-md-5">
						<select name="publication_status" class="form-control" id="publication_status">
							<option value="" selected disabled>Select One</option>
							<option value="1">Published</option>
							<option value="0">Unpublished</option>
						</select>
						@if ($errors->has('publication_status'))
						<span class="help-block">
							<strong>{{ $errors->first('publication_status') }}</strong>
						</span>
						@endif
					</div>
				</div>
				
				<div class="form-group{{ $errors->has('featured_image') ? ' has-error' : '' }}">
					<label for="featured_image" class="col-md-2 control-label">Featured Image</label>
					<div class="col-md-5">
						<input type="file" name="featured_image" id="featured_image" class="form-control">
						<p class="help-block">Example block-level help text here.</p>
						@if ($errors->has('featured_image'))
						<span class="help-block">
							<strong>{{ $errors->first('featured_image') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('product_images') ? ' has-error' : '' }}">
					<label for="product_images" class="col-md-2 control-label">Product Images</label>
					<div class="col-md-5">
						<input type="file" name="product_images[]" id="product_images" class="form-control" multiple>
						<p class="help-block">You can select multiple images.</p>
						@if ($errors->has('product_images'))
						<span class="help-block">
							<strong>{{ $errors->first('product_images') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('is_featured') ? ' has-error' : '' }}">
					<label for="is_featured" class="col-md-2 control-label">Is Featured ?</label>
					<div class="col-md-9">
						<label class="radio-inline">
							<input type="radio" name="is_featured" id="is_featured_1" value="1" {{ old('is_featured') == 1 ? 'checked' : '' }}>Yes
						</label>
						<label class="radio-inline">
							<input type="radio" name="is_featured" id="is_featured_2" value="0" {{ old('is_featured') == 0 ? 'checked' : '' }}>No
						</label>
						@if ($errors->has('is_featured'))
						<span class="help-block">
							<strong>{{ $errors->first('is_featured') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('youtube_video_url') ? ' has-error' : '' }}">
					<label for="youtube_video_url" class="col-md-2 control-label">Youtube Video URL</label>
					<div class="col-md-9">
						<input type="text" name="youtube_video_url" class="form-control" id="youtube_video_url" value="{{ old('youtube_video_url') }}" placeholder="ex: https://www.youtube.com/watch?v=CSGiwf7KlrQ">
						@if ($errors->has('youtube_video_url'))
						<span class="help-block">
							<strong>{{ $errors->first('youtube_video_url') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('product_details') ? ' has-error' : '' }}">
					<label for="product_details" class="col-md-2 control-label">Product Details</label>
					<div class="col-md-9">
						<textarea name="product_details" class="form-control summernote" id="product_details">{{ old('product_details') }}</textarea>
						@if ($errors->has('product_details'))
						<span class="help-block">
							<strong>{{ $errors->first('product_details') }}</strong>
						</span>
						@endif
					</div>
				</div>

				<div class="form-group{{ $errors->has('product_title') ? ' has-error' : '' }}">
					<label class="col-md-2 control-label"></label>
					<div class="col-md-9">
						<div class="bs-callout bs-callout-success">
							<h4>SEO Information</h4>
						</div>
					</div>
				</div>
				<div class="form-group{{ $errors->has('meta_title') ? ' has-error' : '' }}">
					<label for="meta_title" class="col-md-2 control-label">Meta Title</label>
					<div class="col-md-9">
						<input type="text" name="meta_title" class="form-control" id="meta_title" value="{{ old('meta_title') }}" placeholder="ex: product title">
						@if ($errors->has('meta_title'))
						<span class="help-block">
							<strong>{{ $errors->first('meta_title') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
					<label for="meta_keywords" class="col-md-2 control-label">Meta Keywords</label>
					<div class="col-md-9">
						<input type="text" name="meta_keywords" class="form-control" id="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="ex: product, title">
						@if ($errors->has('meta_keywords'))
						<span class="help-block">
							<strong>{{ $errors->first('meta_keywords') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
					<label for="meta_description" class="col-md-2 control-label">Meta Description</label>
					<div class="col-md-9">
						<textarea name="meta_description" id="meta_description" class="form-control" rows="3" placeholder="ex: product dscription">{{ old('meta_description') }}</textarea>
						@if ($errors->has('meta_description'))
						<span class="help-block">
							<strong>{{ $errors->first('meta_description') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-2 col-md-10">
						<button type="submit" class="btn btn-info btn-flat">Add Product</button>
					</div>
				</div>
			</form>
		</div>
		<!-- /.box-body -->
		<div class="box-footer clearfix">
		</div>
	</div>
</section>
<!-- /.main content -->
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.select2-product-tag').select2();
	});
</script>
<script type="text/javascript" src="{{ asset('public/admin/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
	$(function () {
		var date = new Date();
		//date.setDate(date.getDate()-1);
        $('#product_date').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            startDate: date,
        });
        $('#product_date').datepicker('setDate', 'now');
	});
</script>
<script type="text/javascript">
	$(function(){
	$('.summernote').summernote({
		height: 200
	})
})
</script>
<script type="text/javascript">
	document.forms['product_add_form'].elements['category_id'].value = "{{ old('category_id') }}";
	document.forms['product_add_form'].elements['publication_status'].value = "{{ old('publication_status') }}";
</script>
@endsection