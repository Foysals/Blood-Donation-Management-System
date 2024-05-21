@extends('layouts.app')
@section('title','Students')
@section("style")


	<link href="assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

@endsection
@section("script")

	<script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
	<script>
		var table;
		$(document).ready(function(){
			studentList();

			$(document).on('change', '#filter_course', function () {
				var element = $(this);
				//alert(element.val())
				$('#filter_group').empty();
				$('#filter_session').empty();
				$.ajax({
					type: "POST",
					url: "{{ route('get_group_data') }}",
					data: {
						id:element.val(),
						_token:"{{csrf_token()}}"
					},
					success: function (response) {
						//console.log(response)
						if(response.length>0) {
							response.map(function (value, key) {
								$('#filter_group').append(`<option value="${value.id}">${value.group_name}</option>`);
							});
						}
						else{
							$('#filter_group').append(`<option value="0">None</option>`);
						}

					},
					error: function (request, status, error) {
						console.log(request.responseText);
						//toastr.warning( 'Server Error. Try aging!', 'Warning');
					}
				});

				$.ajax({
					type: "POST",
					url: "{{ route('get_session_data') }}",
					data: {
						id:element.val(),
						_token:"{{csrf_token()}}"
					},
					success: function (response) {
						//console.log(response)
						if(response.length>0) {
							response.map(function (value, key) {
								$('#filter_session').append(`<option value="${value.id}">${value.session_name}</option>`);
							});
						}
						else{
							$('#filter_session').append(`<option value="0">None</option>`);
						}

					},
					error: function (request, status, error) {
						console.log(request.responseText);
						//toastr.warning( 'Server Error. Try aging!', 'Warning');
					}
				});

			});
		});

		function studentList(){
			var filterData  = {
				filter_course   : $("#filter_course").val(),
				filter_group    : $("#filter_group").val(),
				filter_session  : $("#filter_session").val(),
				filter_section  : $("#filter_section").val()
			};

			table = $('#studentList').DataTable
			({
				"bAutoWidth": false,
				"destroy": true,
				"bProcessing": true,
				"serverSide": true,
				"responsive": false,
				"aaSorting": [[0, 'desc']],
				"scrollX": true,
				"scrollCollapse": true,
				"columnDefs": [
					{
						"targets": [2,3,4,5],
						"orderable": false
					}, {
						"targets": [0, 1,4,5],
						className: "text-center"
					}],
				"ajax": {
					url: "{{ route('student_list') }}",
					type: "post",
					"data": {
						_token: "{{ csrf_token() }}",
						search: filterData
					},
					"aoColumnDefs": [{
						'bSortable': false
					}],

					"dataSrc": function (jsonData) {
						return jsonData.data;
					},
					error: function (request, status, error) {
						console.log(request.responseText);
						//toastr.warning('Server Error. Try aging!', 'Warning');
					}
				}
			});
		}
	</script>

@endsection
@section('content')


	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<li class="breadcrumb-item"><a href="javascript: void(0);">Students</a></li>
								<li class="breadcrumb-item active">Student List</li>
							</ol>
						</div>
						<h4 class="page-title">@yield("title")</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<div class="row">
				<div class="col-12">
					<div class="card-box">
						<h4 class="header-title">Filter</h4>

						<form method="post" action="{{ route("print_student") }}" target="_blank"  enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="print" value="1">
							<div class="row">
								<div class="col-md-2">
									<label for="filter_course">Class <span class="text-danger">*</span></label>
									<select class="form-control"  data-toggle="select2" name="filter_course" id="filter_course">
										<option value="">Select Class</option>
										@foreach($courses as $course)
											<option value="{{ $course->id }}">{{ $course->course_name }}</option>
										@endforeach
									</select>
								</div>

								<div class="col-md-2">
									<label for="filter_group">Group <span class="text-danger">*</span></label>
									<select class="form-control"  data-toggle="select2" name="filter_group" id="filter_group"></select>
								</div>

								<div class="col-md-2">
									<label for="filter_session">Session <span class="text-danger">*</span></label>
									<select class="form-control"  data-toggle="select2" name="filter_session" id="filter_session"></select>
								</div>

								<div class="col-md-2">
									<label for="filter_section">Section <span class="text-danger">*</span></label>
									<select class="form-control"  data-toggle="select2" name="filter_section" id="filter_section">
										@foreach($sections as $value)
											<option value="{{ $value->id }}">{{ $value->section_name }}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-2">
									<button name="search" value="1" style="    margin-top: 29px;" class="btn btn-primary waves-effect waves-light mr-1" type="button" onclick="studentList()">
										<i class="fa fa-search"></i>
									</button>
									<button   style="    margin-top: 29px;" class="btn btn-success waves-effect waves-light mr-1 print" type="submit">
										<i class="fa fa-print"></i>
									</button>
								</div>


							</div>
						</form>
					</div> <!-- end card-box -->
					<div class="card-box">
						{{--<h4 class="header-title">Default Example</h4>--}}
						{{--<p class="sub-header">--}}
							{{--DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.--}}
						{{--</p>--}}

						<table id="studentList" class="table table-bordered dt-responsive nowrap">
							<thead>
							<tr>
								<th>User ID</th>
								<th>Roll</th>
								<th>Name</th>
								<th>Father's Name</th>
								<th>Guardian Mobile</th>
								<th class="text-center">Action</th>
							</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div> <!-- end card-box -->
				</div> <!-- end col -->
			</div> <!-- end row -->


		</div> <!-- container-fluid -->

	</div> <!-- content -->


@endsection

