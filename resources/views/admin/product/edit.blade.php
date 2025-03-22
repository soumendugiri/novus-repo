@extends('admin.layouts.app')
@section('title', 'Post')


@section('style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ custom_asset('admin/css/bootstrap-datepicker.min.css') }}">
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
<style>
        .multi-input-container {
            display: flex;
            flex-wrap: wrap;
            border: 1px solid #ccc;
            padding: 5px;
            border-radius: 5px;
            cursor: text;
        }
        .multi-input-container input {
            border: none;
            flex: 1;
            min-width: 100px;
            padding: 5px;
            outline: none;
        }
        .multi-tag {
            background-color: #007bff;
            color: white;
            border-radius: 3px;
            padding: 3px 8px;
            margin: 2px;
            display: flex;
            align-items: center;
        }
        .multi-tag span {
            margin-left: 5px;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
<!-- Page header -->

<section class="content-header">
	<h1>
		PRODUCTS
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('admin.dashboardRoute') }}"><i class="fa fa-home"></i> Dashboard</a></li>
		<li><a href="{{ route('admin.products.index') }}">Product</a></li>
		<li class="active">Edit Product</li>
	</ol>
</section>
<!-- /.page header -->

<!-- Main content -->
<section class="content">
	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Edit Product</h3>

			<div class="box-tools">
				<a href="{{ route('admin.products.index') }}" class="btn btn-info btn-sm btn-flat"><i class="fa fa-list"></i> Manage Products</a>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
			<form name="products_edit_form" class="form-horizontal" action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
				{{method_field('PATCH')}}
				{{csrf_field()}}
				<div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
					<label for="product_name" class="col-md-2 control-label">Product Name</label>
					<div class="col-md-9">
						<input type="text" name="product_name" class="form-control" id="product_name" placeholder="ex: product name" value="{{ $product->product_name }}">
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
						<input type="text" name="product_sku" class="form-control" id="product_sku" placeholder="ex: product-sku" value="{{ $product->product_sku }}">
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
						<input type="number" name="price" class="form-control" id="price" value="{{$product->price}}" placeholder="ex: 100.00">
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
						<input type="number" name="stock" class="form-control" id="stock" value="{{$product->stock}}"  placeholder="ex: 50">
						@if ($errors->has('stock'))
						<span class="help-block">
							<strong>{{ $errors->first('stock') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
					<label for="company_id" class="col-md-2 control-label">Company</label>
					<div class="col-md-5">
						<select name="company_id" class="form-control" id="company_id">
							<option value="" selected disabled>Select One</option>
							@foreach($companies as $company)
							<option value="{{ $company->id }}">{{ $company->company_name}}</option>
							@endforeach
						</select>
						@if ($errors->has('company_id'))
						<span class="help-block">
							<strong>{{ $errors->first('company_id') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group{{ $errors->has('product_fetures') ? ' has-error' : '' }}">
					<label for="multiInput" class="col-md-2 control-label">Features</label>
					<div class="col-md-5">
					<div class="multi-input-container" id="multiInput">
						@foreach(explode(",",$product->product_fetures) ?? [] as $d)
						<div class="multi-tag">{{$d}}<span>×</span></div>
						@endforeach
						<input type="text" id="multiInputField" placeholder="Add features and press tab">
					</div>
					<input type="hidden" name="product_fetures" id="product_fetures_hidden">
						@if ($errors->has('product_fetures'))
						<span class="help-block">
							<strong>{{ $errors->first('product_fetures') }}</strong>
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
						@php($is_featured = $product->is_featured)
							<input type="radio" name="is_featured" id="is_featured_1" value="1" {{ $is_featured == 1 ? 'checked' : '' }}>Yes
						</label>
						<label class="radio-inline">
							<input type="radio" name="is_featured" id="is_featured_2" value="0" {{ $is_featured == 0 ? 'checked' : '' }}>No
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
						<input type="text" name="youtube_video_url" class="form-control" id="youtube_video_url" value="{{$product->youtube_video_url}}" placeholder="ex: https://www.youtube.com/watch?v=CSGiwf7KlrQ">
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
						<textarea name="product_details" class="form-control summernote" id="product_details">{{ $product->product_details }}</textarea>
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
						<input type="text" name="meta_title" class="form-control" id="meta_title" value="{{$product->meta_title}}" placeholder="ex: product title">
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
						<input type="text" name="meta_keywords" class="form-control" id="meta_keywords" value="{{$product->meta_keywords}}" placeholder="ex: product, title">
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
						<textarea name="meta_description" id="meta_description" class="form-control" rows="3" placeholder="ex: product dscription">{{ $product->meta_description }}</textarea>
						@if ($errors->has('meta_description'))
						<span class="help-block">
							<strong>{{ $errors->first('meta_description') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-2 col-md-10">
						<button type="submit" class="btn btn-info btn-flat">Edit Post</button>
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
<script type="text/javascript" src="{{ custom_asset('admin/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
	$(function () {
		var date = new Date();
		//date.setDate(date.getDate()-1);
        $('#post_date').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            startDate: date,
        });
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
	document.forms['products_edit_form'].elements['company_id'].value = "{{ $product->company->id }}";
	document.forms['products_edit_form'].elements['publication_status'].value = "{{ $product->publication_status }}";
	const container = document.getElementById('multiInput');
    const input = document.getElementById('multiInputField');
    const hiddenField = document.getElementById('product_fetures_hidden');

    input.addEventListener('keydown', function(event) {
        if (event.key === 'Enter' || event.key === 'Tab') {
            event.preventDefault();
            const value = input.value.trim();
            if (value) {
                addTag(value);
                input.value = '';
            }
        }
    });

    function addTag(text) {
        const tag = document.createElement('div');
        tag.className = 'multi-tag';
        tag.textContent = text;

        const close = document.createElement('span');
        close.textContent = '×';
        close.addEventListener('click', function() {
            tag.remove();
        });

        tag.appendChild(close);
        container.insertBefore(tag, input);

		const tags = [...document.querySelectorAll('#multiInput .multi-tag')].map(tag => tag.childNodes[0].textContent.trim());
        hiddenField.value = tags.join(',');
    }
</script>
@endsection