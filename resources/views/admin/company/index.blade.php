@extends('admin.layouts.app')
@section('title', 'Company')


@section('style')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css"> -->

	<link rel="stylesheet" href="{{ custom_asset('admin/datatable/css/dataTables.bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{ custom_asset('admin/datatable/css/buttons.dataTables.min.css')}}">
	@endsection

	@section('content')
	<!-- Page header -->
	<section class="content-header">
		<h1>
			COMPANY
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{ route('admin.dashboardRoute') }}"><i class="fa fa-home"></i> Dashboard</a></li>
			<li class="active">Company</li>
		</ol>
	</section>
	<!-- /.page header -->

	<!-- Main content -->
	<section class="content">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Manage Companies</h3>

				<div class="box-tools">
					<button type="button" class="btn btn-info btn-sm btn-flat add-button"><i class="fa fa-plus"></i> Add Company</button>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div style="width: 100%; padding-left: -10px;">
					<div class="table-responsive">
						<table id="companies-table" class="table table-striped table-hover dt-responsive display nowrap" cellspacing="0">
							<thead>
								<tr>
									<th>Company Logo</th>
									<th>Company Name</th>
									<th>Company Slug</th>
									<th>Created By</th>
									<th>Created At</th>
									<th>Updated At</th>
									<th width="10%">Publication Status</th>
									<th width="7%">Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
			<div class="box-footer clearfix">
			</div>
		</div>
	</section>
	<!-- /.main content -->

	<!-- add category modal -->
	<div id="add-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">
							<span class="fa-stack fa-sm">
								<i class="fa fa-square-o fa-stack-2x"></i>
								<i class="fa fa-plus fa-stack-1x"></i>
							</span>
							Add Company
						</h4>
					</div>
					<form role="form" id="company_add_form" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="modal-body">
							<div class="form-group">
								<label for="company_name">Company Name</label>
								<input type="text" name="company_name" class="form-control" id="company_name" value="{{ old('company_name') }}" placeholder="ex: company">
								<span class="text-danger" id="company-name-error"></span>
							</div>
							<div class="form-group">
								<label for="company_slug">Company Slug</label>
								<input type="text" name="company_slug" class="form-control" id="company_slug" value="{{ old('company_slug') }}" placeholder="ex: company_slug">
								<span class="text-danger" id="category-slug-error"></span>
							</div>
							<div class="form-group">
								<label for="company_desc">Company Description</label>
								<input type="text" name="company_desc" class="form-control" id="company_desc" value="{{ old('company_desc') }}" placeholder="ex: company_desc">
								<span class="text-danger" id="category-slug-error"></span>
							</div>
							<div class="form-group">
								<label>Publication Status</label>
								<select class="form-control" name="publication_status" id="publication_status">
									<option selected disabled>Select One</option>
									<option value="1">Published</option>
									<option value="0">Unpublished</option>
								</select>
								<span class="text-danger" id="publication-status-error"></span>
							</div>

							<div class="form-group">
								<label for="company_logo">Company logo</label>
								<input type="file" name="company_logo" class="form-control" id="company_logo" value="{{ old('company_logo') }}" placeholder="ex: company logo">
								<span class="text-danger" id="company_logo-error"></span>
							</div>

							<div class="bs-callout bs-callout-success">
								<h4>SEO Information</h4>
							</div>

							<div class="form-group">
								<label for="meta_title">Meata Title</label>
								<input type="text" name="meta_title" class="form-control" id="meta_title" value="{{ old('meta_title') }}" placeholder="ex: company title">
								<span class="text-danger" id="meta-title-error"></span>
							</div>
							<div class="form-group">
								<label for="meta_keywords">Meata Keywords</label>
								<input type="text" name="meta_keywords" class="form-control" id="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="ex: company, title">
								<span class="text-danger" id="meta-keywords-error"></span>
							</div>
							<div class="form-group">
								<label for="meta_description">Meta Description</label>
								<textarea name="meta_description" class="form-control" id="meta_description" rows="3" placeholder="ex: company dscription">{{ old('meta_description') }}</textarea>
								<span class="text-danger" id="meta-description-error"></span>
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-info btn-flat" id="store-button">Save changes</button>
						</div>
					</form>

				</div>
			</div>
		</div>
		<!-- /.add category modal -->

		<!-- view category modal -->
		<div id="view-modal" class="modal fade bs-example-modal-lg print-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<div class="btn-group pull-right no-print">
							<div class="btn-group">
								<button class="tip btn btn-default btn-flat btn-sm" id="print-button" data-toggle="tooltip" data-original-title="Print">
									<i class="fa fa-print"></i>
									<span class="hidden-sm hidden-xs"></span>
								</button>
							</div>
							<div class="btn-group">
								<button class="tip btn btn-default btn-flat btn-sm" data-toggle="tooltip" data-original-title="Close" data-dismiss="modal" aria-label="Close">
									<i class="fa fa-remove"></i>
									<span class="hidden-sm hidden-xs"></span>
								</button>
							</div>
						</div>
						<h4 class="modal-title" id="view-company-name"></h4>
					</div>
					<div class="modal-body">
						<table class="table table-bordered table-striped">
							<tbody>
								<tr>
									<td>Company Slug</td>
									<td id="view-company-slug"></td>
								</tr>
								<tr>
									<td>Company Des.</td>
									<td id="view-company-desc"></td>
								</tr>
								<tr>
									<td>Publication Status</td>
									<td id="view-publication-status"></td>
								</tr>
								<tr>
									<td>Meta Title</td>
									<td id="view-meta-title"></td>
								</tr>
								<tr>
									<td>Meta Keywords</td>
									<td id="view-meta-keywords"></td>
								</tr>
								<tr>
									<td>Meta Description</td>
									<td id="view-meta-description"></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="modal-footer no-print">
						<button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-label="Close">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /.view category modal -->

		<!-- delete category modal -->
		<div id="delete-modal" class="modal modal-danger fade" id="modal-danger">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">
								<span class="fa-stack fa-sm">
									<i class="fa fa-square-o fa-stack-2x"></i>
									<i class="fa fa-trash fa-stack-1x"></i>
								</span>
								Are you sure want to delete this ?
							</h4>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
							<form method="post" role="form" id="delete_form">
								{{csrf_field()}}
								{{method_field('DELETE')}}
								<button type="submit" class="btn btn-outline">Delete</button>
							</form>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.delete category modal -->


			<!-- edit category modal -->
			<div id="edit-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">
									<span class="fa-stack fa-sm">
										<i class="fa fa-square-o fa-stack-2x"></i>
										<i class="fa fa-edit fa-stack-1x"></i>
									</span>
									Edit Company
								</h4>
							</div>
							<form role="form" id="company_edit_form" method="post" enctype="multipart/form-data">
								{{method_field('PATCH')}}
								{{csrf_field()}}
								<input type="hidden" name="company_id" id="edit-company-id">
								<div class="modal-body">
									<div class="form-group">
										<label for="company_name">Company Name</label>
										<label for="company_name">Company Name</label>
										<input type="text" name="company_name" class="form-control" id="edit-company-name" placeholder="ex: category">
										<span class="text-danger category-name-error"></span>
									</div>
									<div class="form-group">
										<label for="company_slug">Company Slug</label>
										<input type="text" name="company_slug" class="form-control" id="edit-company-slug" placeholder="ex: company_slug">
										<span class="text-danger category-slug-error"></span>
									</div>
									<div class="form-group">
										<label for="company_desc">Company Description</label>
										<input type="text" name="company_desc" class="form-control" id="edit-company-desc" placeholder="ex: company_desc">
										<span class="text-danger category-slug-error"></span>
									</div>
									<div class="form-group">
										<label>Publication Status</label>
										<select class="form-control" name="publication_status" id="edit-publication-status">
											<option selected disabled>Select One</option>
											<option value="1">Published</option>
											<option value="0">Unpublished</option>
										</select>
										<span class="text-danger publication-status-error"></span>
									</div>

									<div class="form-group">
										<label for="company_logo">Company logo</label>
										<input type="file" name="company_logo" class="form-control" id="company_logo" value="{{ old('company_logo') }}" placeholder="ex: company logo">
										<span class="text-danger" id="company_logo-error"></span>
									</div>

									<div class="bs-callout bs-callout-success">
										<h4>SEO Information</h4>
									</div>

									<div class="form-group">
										<label for="meta_title">Meata Title</label>
										<input type="text" name="meta_title" class="form-control" id="edit-meta-title" placeholder="ex: category title">
										<span class="text-danger meta-title-error"></span>
									</div>
									<div class="form-group">
										<label for="meta_keywords">Meata Keywords</label>
										<input type="text" name="meta_keywords" class="form-control" id="edit-meta-keywords" placeholder="ex: category, title">
										<span class="text-danger meta-keywords-error"></span>
									</div>
									<div class="form-group">
										<label for="meta_description">Meta Description</label>
										<textarea name="meta_description" class="form-control" id="edit-meta-description" rows="3" placeholder="ex: category dscription"></textarea>
										<span class="text-danger meta-description-error"></span>
									</div>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-info btn-flat update-button">Update</button>
								</div>
							</form>

						</div>
					</div>
				</div>
				<!-- /.edit category modal -->

				<!-- view user modal -->
				<div id="user-view-modal" class="modal fade bs-example-modal-lg print-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<div class="btn-group pull-right no-print">
									<div class="btn-group">
										<button class="tip btn btn-default btn-flat btn-sm" id="print-button" data-toggle="tooltip" data-original-title="Print">
											<i class="fa fa-print"></i>
											<span class="hidden-sm hidden-xs"></span>
										</button>
									</div>
									<div class="btn-group">
										<button class="tip btn btn-default btn-flat btn-sm" data-toggle="tooltip" data-original-title="Close" data-dismiss="modal" aria-label="Close">
											<i class="fa fa-remove"></i>
											<span class="hidden-sm hidden-xs"></span>
										</button>
									</div>
								</div>
								<h4 class="modal-title" id="view-name"></h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-9">
										<table class="table table-bordered table-striped">
											<tbody>
												<tr>
													<td width="20%">Role</td>
													<td id="view-role"></td>
												</tr>
												<tr>
													<td>Username</td>
													<td id="view-username"></td>
												</tr>
												<tr>
													<td>Email</td>
													<td id="view-email"></td>
												</tr>
												<tr>
													<td>Gender</td>
													<td id="view-gender"></td>
												</tr>
												<tr>
													<td>Phone</td>
													<td id="view-phone"></td>
												</tr>
												<tr>
													<td>Address</td>
													<td id="view-address"></td>
												</tr>
												<tr>
													<td>Facebook</td>
													<td id="view-facebook"></td>
												</tr>
												<tr>
													<td>Twitter</td>
													<td id="view-twitter"></td>
												</tr>
												<tr>
													<td>Google Plus</td>
													<td id="view-google-plus"></td>
												</tr>
												<tr>
													<td>Linkedin</td>
													<td id="view-linkedin"></td>
												</tr>
												<tr>
													<td>Status</td>
													<td id="view-status"></td>
												</tr>
												<tr>
													<td>About</td>
													<td id="view-about"></td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col-md-3">
										<img id="view-avatar" class="img-responsive img-thumbnail img-rounded">
									</div>
								</div>
							</div>
							<div class="modal-footer no-print">
								<button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-label="Close">Close</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /.view user modal -->
				@endsection

				@section('script')
	<!-- <script type="text/javascript" src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script> -->

	<script type="text/javascript" src="{{ custom_asset('admin/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script type="text/javascript" src="{{ custom_asset('admin/datatable/js/datatables.bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ custom_asset('admin/datatable/js/dataTables.buttons.min.js') }}"></script>
	<script type="text/javascript" src="{{ custom_asset('admin/datatable/js/buttons.flash.min.js') }}"></script>
	<script type="text/javascript" src="{{ custom_asset('admin/datatable/js/pdfmake.min.js') }}"></script>
	<script type="text/javascript" src="{{ custom_asset('admin/datatable/js/vfs_fonts.js') }}"></script>
	<script type="text/javascript" src="{{ custom_asset('admin/datatable/js/buttons.html5.min.js') }}"></script>
	<script type="text/javascript" src="{{ custom_asset('admin/datatable/js/buttons.print.min.js') }}"></script>
	<script type="text/javascript" src="{{ custom_asset('admin/datatable/js/buttons.colVis.min.js') }}"></script>

	<script type="text/javascript">
		/** Load datatable **/
		$(document).ready(function() {
			get_table_data();
		});

		/** Edit **/
		$("#companies-table").on("click", ".edit-button", function(){
			var company_id = $(this).data("id");
			var url = "{{ route('admin.companies.show', 'company_id') }}";
			url = url.replace("company_id", company_id);
			$.ajax({
				url: url,
				method: "GET",
				dataType: "json",
				success:function(data){
					console.log(data);
					$('#edit-modal').modal('show');
					$('#edit-company-id').val(data['id']);
					$('#edit-company-name').val(data['company_name']);
					$('#edit-company-slug').val(data['company_slug']);
					$('#edit-company-desc').val(data['company_desc']);
					$('#edit-publication-status').val(data['publication_status']);
					$('#edit-meta-title').val(data['meta_title']);
					$('#edit-meta-keywords').val(data['meta_keywords']);
					$('#edit-meta-description').val(data['meta_description']);
				}});
		});

		/** Update **/
		$(".update-button").click(function(){
			var company_id = $('#edit-company-id').val();
			var url = "{{ route('admin.companies.update', 'company_id') }}";
			url = url.replace("company_id", company_id);
			var company_edit_form = $("#company_edit_form")[0];
			var form_data = new FormData(company_edit_form); 
			$( '.category-name-error' ).html( "" );
			$( '.category-slug-error' ).html( "" );
			$( '.publication-status-error' ).html( "" );
			$( '.meta-title-error' ).html( "" );
			$( '.meta-keywords-error' ).html( "" );
			$( '.meta-description-error' ).html( "" );
			$.ajax({
				url: url,
				type:'POST',
				data:form_data,
				contentType: false, 
				processData: false, 
				cache: false,
				success:function(data) {
					console.log(data);
					if(data.errors) {
						if(data.errors.company_name){
							$( '.category-name-error' ).html( data.errors.company_name[0] );
						}
						if(data.errors.company_slug){
							$( '.category-slug-error' ).html( data.errors.company_slug[0] );
						}
						if(data.errors.publication_status){
							$( '.publication-status-error' ).html( data.errors.publication_status[0] );
						}
						if(data.errors.meta_title){
							$( '.meta-title-error' ).html( data.errors.meta_title[0] );
						}
						if(data.errors.meta_keywords){
							$( '.meta-keywords-error' ).html( data.errors.meta_keywords[0] );
						}
						if(data.errors.meta_description){
							$( '.meta-description-error' ).html( data.errors.meta_description[0] );
						}
					}
					if(data.success) {
						window.location.href = '{{ route('admin.companies.index') }}';
					}
				},
			});
		});

		/** Delete **/
		$("#companies-table").on("click", ".delete-button", function(){
			var company_id = $(this).data("id");
			var url = "{{ route('admin.companies.destroy', 'company_id') }}";
			url = url.replace("company_id", company_id);
			$('#delete-modal').modal('show');
			$('#delete_form').attr('action', url);
		});

		/** View **/
		$("#companies-table").on("click", ".view-button", function(){
			var company_id = $(this).data("id");
			var url = "{{ route('admin.companies.show', 'company_id') }}";
			url = url.replace("company_id", company_id);
			$.ajax({
				url: url,
				method: "GET",
				dataType: "json",
				success:function(data){
					$('#view-modal').modal('show');
					$('#view-company-name').text(data['company_name']);
					$('#view-company-slug').text(data['company_slug']);
					$('#view-company-desc').text(data['company_desc']);
					if(data['publication_status'] == 1){
						$('#view-publication-status').text('Published');
					}else{
						$('#view-publication-status').text('Unpublished');
					}
					$('#view-meta-title').text(data['meta_title']);
					$('#view-meta-keywords').text(data['meta_keywords']);
					$('#view-meta-description').text(data['meta_description']);
				}});
		});

		/** Add **/
		$(".add-button").click(function(){
			$('#add-modal').modal('show');
		});

		/** Store **/
		$("#store-button").click(function(){
			
			var company_add_form = $("#company_add_form")[0];
			var form_data = new FormData(company_add_form); 
		
			$( '#category-name-error' ).html( "" );
			$( '#category-slug-error' ).html( "" );
			$( '#publication-status-error' ).html( "" );
			$( '#meta-title-error' ).html( "" );
			$( '#meta-keywords-error' ).html( "" );
			$( '#meta-description-error' ).html( "" );
			$.ajax({
				url:'{{ route('admin.companies.store') }}',
				type:'POST',
				data:form_data,
				contentType: false, 
				processData: false, 
				cache: false,
				success:function(data) {
					console.log(data);
					if(data.errors) {
						if(data.errors.company_name){
							$( '#category-name-error' ).html( data.errors.company_name[0] );
						}
						if(data.errors.company_slug){
							$( '#category-slug-error' ).html( data.errors.company_slug[0] );
						}
						if(data.errors.publication_status){
							$( '#publication-status-error' ).html( data.errors.publication_status[0] );
						}
						if(data.errors.company_logo){
							$( '#company_logo-error' ).html( data.errors.company_logo[0] );
						}
						if(data.errors.meta_title){
							$( '#meta-title-error' ).html( data.errors.meta_title[0] );
						}
						if(data.errors.meta_keywords){
							$( '#meta-keywords-error' ).html( data.errors.meta_keywords[0] );
						}
						if(data.errors.meta_description){
							$( '#meta-description-error' ).html( data.errors.meta_description[0] );
						}
					}
					if(data.success) {
						window.location.href = '{{ route('admin.companies.index') }}';
					}
				},
			});
		});

		/** Get datatable **/
		function get_table_data(){
			$('#companies-table').DataTable({
				dom: 'Blfrtip',
				buttons: [
				{ extend: 'copy', exportOptions: { columns: ':visible'}},
				{ extend: 'print', exportOptions: { columns: ':visible'}},
				{ extend: 'pdf', orientation: 'landscape', pageSize: 'A4', exportOptions: { columns: ':visible'}},
				{ extend: 'csv', exportOptions: { columns: ':visible'}},
				{ extend: 'colvis', text:'Column'},
				],
				columnDefs: [ {
					targets: -1,
					visible: true
				} ],
				lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
				processing: true,
				serverSide: true,
				ajax: "{{ route('admin.getCompaniesRoute') }}",
				columns: [
				{data: 'company_logo'},
				{data: 'company_name'},
				{data: 'company_slug'},
				{data: 'username', name: 'username', orderable: true, searchable: true},
				{data: 'created_at'},
				{data: 'updated_at'},
				{data: 'publication_status', name: 'publication_status', orderable: false, searchable: false},
				{data: 'action', name: 'action', orderable: false, searchable: false},
				],
				order: [[3, 'desc']],
			});
		}

		/** User View **/
		$("#categories-table").on("click", ".user-view-button", function(){
			var id = $(this).data("id");
			var url = "{{ route('admin.users.show', 'id') }}";
			url = url.replace("id", id);
			$.ajax({
				url: url,
				method: "GET",
				dataType: "json",
				success:function(data){
					var src = '{{ custom_asset('/avatar') }}/';
					var default_avatar = '{{ custom_asset('/avatar/user.png') }}';
					$('#user-view-modal').modal('show');

					$('#view-name').text(data['name']);
					$('#view-username').text(data['username']);
					$('#view-email').text(data['email']);
					$("#view-avatar").attr("src", src+data['avatar']);
					if(data['avatar']){
						$("#view-avatar").attr("src", src+data['avatar']);
					}else{
						$("#view-avatar").attr("src", default_avatar);
					}
					if(data['gender'] == 'm'){
						$('#view-gender').text('Male');
					}else{
						$('#view-gender').text('Female');
					}
					$('#view-phone').text(data['phone']);
					$('#view-address').text(data['address']);
					$('#view-facebook').text(data['facebook']);
					$('#view-twitter').text(data['twitter']);
					$('#view-google-plus').text(data['google_plus']);
					$('#view-linkedin').text(data['linkedin']);
					$('#view-about').text(data['about']);
					if(data['role'] == 'admin'){
						$('#view-role').text('Admin');
					}else{
						$('#view-role').text('User');
					}
					if(data['activation_status'] == 1){
						$('#view-status').text('Active');
					}else{
						$('#view-status').text('Block');
					}
				}});
		});
	</script>
	@endsection