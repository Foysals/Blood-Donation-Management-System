@extends('backend.layouts.app')
@section('title','Donation History')
@section('content')

<script>
		var table;
		$(document).ready(function(){
			donateList();
		});

		function donateList(){

			//$('#donateList').DataTable();
			table = $('#donateList').DataTable
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
						"targets": [2,3],
						"orderable": false
					}, {
						"targets": [0, 1,3],
						className: "text-center"
					}],
				"ajax": {
					url: "{{ url('history') }}",
					type: "post",
					"data": {
						_token: "{{ csrf_token() }}"
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

						<table id="donateList" class="table table-bordered dt-responsive nowrap">
							<thead>
								<tr>
									<th>#</th>
									<th>Date</th>
									<th>Location</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
						</table>
					</div> <!-- end card-box -->
				</div> <!-- end col -->
			</div> <!-- end row -->


		</div> <!-- container-fluid -->

	</div> <!-- content -->



@endsection
