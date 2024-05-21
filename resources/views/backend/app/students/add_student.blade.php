@extends('layouts.app')
@section('title','Student Form')
@section("content")

<!-- Validation js (Parsleyjs) -->
<script src="assets/libs/parsleyjs/parsley.min.js"></script>

<!-- validation init -->
<script src="assets/js/pages/form-validation.init.js"></script>

<script>@if($students)
	var groups="{{$students->group_id}}";
	var sessions="{{$students->session_id}}";
	$( window ).on("load", function() {
		$('#class_id').val({{$students->course_id}}).trigger('change');
	});
	@endif
	$(document).ready(function(){
		//$("#studentList").DataTable();




		$(document).on('submit', "#DataForm", function (e) {
			e.preventDefault();

			$(".save").text("Saving...").prop("disabled", true);
			$.ajax({
				type: "POST",
				url: "{{ url('save_course') }}",
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				success: function (response)
				{
					console.log(response);
					if (response == 1) {
						$("#DataForm").trigger("reset");
						$("#action").val(1);
						//toastr.success("Have fun storming the castle!","Miracle Max Says")
//                            toastr.success('Data Saved Successfully!','Success');
//                            $("[href='#DataList']").tab("show");
//                            table.ajax.reload();
//                            if($("#action").val()==1){
//
//                            }
					}
					else {
						//  toastr.warning( 'Data Cannot Saved. Try aging!', 'Warning');
					}
					$(".save").text("Save").prop("disabled", false);
				},
				error: function (request, status, error) {
					console.log(request.responseText);
					//toastr.warning( 'Server Error. Try aging!', 'Warning');
					$(".save").text("Save").prop("disabled", false);
				}
			});
		});

		$(document).on('change', '#class_id', function () {
			var element = $(this);
			//alert(element.val())
			$('#group_id').empty();
			$('#session_id').empty();
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
							$('#group_id').append(`<option value="${value.id}" ${groups==value.id?'selected':''}>${value.group_name}</option>`);
						});
					}
					else{
						$('#group_id').append(`<option value="0">None</option>`);
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
							$('#session_id').append(`<option value="${value.id}" ${sessions==value.id?'selected':''}>${value.session_name}</option>`);
						});
					}
					else{
						$('#session_id').append(`<option value="0">None</option>`);
					}

				},
				error: function (request, status, error) {
					console.log(request.responseText);
					//toastr.warning( 'Server Error. Try aging!', 'Warning');
				}
			});

		});

	});
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
							<li class="breadcrumb-item active">@yield("title")</li>
						</ol>
					</div>
					<h4 class="page-title">@yield("title")</h4>
				</div>
			</div>
		</div>
		<!-- end page title -->
		
		<div class="row">
			<div class="col-lg-12">
				
				<div class="card-box">

					@if (session('success'))
						<div class="alert alert-success">
							<i class="flaticon-tick-inside-circle"></i> <strong>Well done!</strong> {{ session('success') }}
						</div>
					@endif
					@if (session('error'))
						<div class="alert alert-success">
							<i class="flaticon-alert-1"></i> <strong>Oh snap!</strong> {{ session('error') }}
						</div>
					@endif

					<h4 class="header-title">Student {{$students?'Update':'Entry'}} Form</h4>
					<p class="sub-header">
						(*) mark field is required.
					</p>
					
					<form method="post" action="{{ route("save-student") }}" class="parsley-examples" enctype="multipart/form-data">
                            @csrf
						<input type="hidden" name="id" value="{{$students?$students->id:''}}">
						<div class="row">
							<div class="col-md-3">
								<label for="student_name">Full Name<span class="text-danger">*</span></label>
								<input type="text" name="student_name" parsley-trigger="change" required
								class="form-control" id="student_name" value="{{$students?$students->student_name:''}}">
							</div>
							<div class="col-md-3">
								<label for="student_mobile">Mobile No. </label>
								<input type="text" name="student_mobile" class="form-control" id="student_mobile" value="{{$students?$students->student_mobile:''}}">
							</div>
							<div class="col-md-3">
								<label for="email">Email address </label>
								<input type="email" name="email" parsley-trigger="change" class="form-control" id="email" value="{{$students?$students->email:''}}">
							</div>
							<div class="col-md-3">
								<label for="dob">DOB <span class="text-danger">*</span></label>
								<div class="input-group">
									<select class="input-group-addon form-control text-center" name="dob_day" id="dob_day">
										@for($i=1;$i<=31;$i++)
										<option  {{$students?(explode("-",$students->dob)[2]==$i?"selected":''):''}} value="{{ $i }}">{{ $i }}</option>
											@endfor
									</select>
									<select class="input-group-addon form-control text-center" name="dob_month" id="dob_month">
										<option {{$students?(explode("-",$students->dob)[1]==1?"selected":''):''}} value="1">Jan</option>
										<option {{$students?(explode("-",$students->dob)[1]==2?"selected":''):''}} value="2">Feb</option>
										<option {{$students?(explode("-",$students->dob)[1]==3?"selected":''):''}} value="3">Mar</option>
										<option {{$students?(explode("-",$students->dob)[1]==4?"selected":''):''}} value="4">Apr</option>
										<option {{$students?(explode("-",$students->dob)[1]==5?"selected":''):''}} value="5">May</option>
										<option {{$students?(explode("-",$students->dob)[1]==6?"selected":''):''}} value="6">Jun</option>
										<option {{$students?(explode("-",$students->dob)[1]==7?"selected":''):''}} value="7">Jul</option>
										<option {{$students?(explode("-",$students->dob)[1]==8?"selected":''):''}} value="8">Aug</option>
										<option {{$students?(explode("-",$students->dob)[1]==9?"selected":''):''}} value="9">Sep</option>
										<option {{$students?(explode("-",$students->dob)[1]==10?"selected":''):''}} value="10">Oct</option>
										<option {{$students?(explode("-",$students->dob)[1]==11?"selected":''):''}} value="11">Nov</option>
										<option {{$students?(explode("-",$students->dob)[1]==12?"selected":''):''}} value="12">Dec</option>
									</select>
									<select class="input-group-addon form-control text-center" name="dob_year" id="dob_year">
										@for($i=1980;$i<=2015;$i++)
											<option {{$students?(explode("-",$students->dob)[0]==$i?"selected":''):''}}  value="{{ $i }}">{{ $i }}</option>
										@endfor
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<label for="gender">Gender <span class="text-danger">*</span></label>
								<select class="form-control" name="gender" id="gender">
									<option {{$students?($students->gender=="Male"?"selected":''):''}} value="Male">Male</option>
									<option {{$students?($students->gender=="Female"?"selected":''):''}} value="Female">Female</option>
									<option {{$students?($students->gender=="Other"?"selected":''):''}} value="Other">Other</option>
								</select>
							</div>
							<div class="col-md-3">
								<label for="religion">Religion <span class="text-danger">*</span></label>
								<select class="form-control" name="religion" id="religion">
									
									<option {{$students?($students->religion=="Islam"?"selected":''):''}} value="Islam">Islam</option>
									<option {{$students?($students->religion=="Hinduism"?"selected":''):''}} value="Hinduism">Hinduism</option>
									<option {{$students?($students->religion=="Buddhism"?"selected":''):''}} value="Buddhism">Buddhism</option>
									<option {{$students?($students->religion=="Christianity"?"selected":''):''}} value="Christianity">Christianity</option>
									<option {{$students?($students->religion=="Other"?"selected":''):''}} value="Other">Other</option>
								</select>
							</div>
							<div class="col-md-3">
								<label for="blood_group">Blood Group </label>
                                    <select class="form-control" name="blood_group" id="blood_group">
										<option value="">Don't know</option>
										<option {{$students?($students->blood_group=="A+"?"selected":''):''}} value="A+">A+</option>
										<option {{$students?($students->blood_group=="A-"?"selected":''):''}} value="A-">A-</option>
										<option {{$students?($students->blood_group=="B+"?"selected":''):''}} value="B+">B+</option>
										<option {{$students?($students->blood_group=="B-"?"selected":''):''}} value="B-">B-</option>
										<option {{$students?($students->blood_group=="AB+"?"selected":''):''}} value="AB+">AB+</option>
										<option {{$students?($students->blood_group=="AB-"?"selected":''):''}} value="AB-">AB-</option>
										<option {{$students?($students->blood_group=="O+"?"selected":''):''}} value="O+">O+</option>
										<option {{$students?($students->blood_group=="O-"?"selected":''):''}} value="O-">O-</option>
                                    </select>
							</div>
                                <div class="col-md-3">
                                        <label for="admission_date">Admission Date <span class="text-danger">*</span></label>
                                        <input parsley-trigger="change" type="date" required
                                               name="admission_date"    class="form-control" id="admission_date"  value="{{$students?$students->admission_date:''}}">
                                </div>
							<div class="col-md-6">
								<label for="present_address">Present Address <span class="text-danger">*</span></label>
								<textarea  parsley-trigger="change" name="present_address"  required
								class="form-control" id="present_address">{{$students?$students->present_address:''}}</textarea>
							</div>
							<div class="col-md-6">
								<label for="permanent_address">Permanent Address <span class="text-danger">*</span></label>
								<textarea parsley-trigger="change" name="permanent_address"  required
								class="form-control" id="permanent_address">{{$students?$students->permanent_address:''}}</textarea>
							</div>
							
							
							
						</div>
						<div class="row">
							<div class="col-md-3">
								<label for="father_name">Father Name <span class="text-danger">*</span></label>
								<input parsley-trigger="change" type="text" required
								class="form-control" id="father_name" name="father_name" value="{{$students?$students->father_name:''}}">
							</div>
							<div class="col-md-3">
								<label for="father_mobile">Mobile No. <span class="text-danger">*</span></label>
								<input parsley-trigger="change" type="text" required
								name="father_mobile" class="form-control" id="father_mobile" value="{{$students?$students->father_mobile:''}}">
							</div>
							<div class="col-md-3">
								<label for="father_occupation">Occupation <span class="text-danger">*</span></label>
                                    <select class="form-control" name="father_occupation" id="father_occupation">
                                            <option value="Private Service Holder">Private Service Holder</option>
                                            <option value="Govt Service Holder">Govt Service Holder</option>
                                            <option value="Businessman">Businessman</option>
                                            <option value="Driver">Driver</option>
                                            <option value="Farmer">Farmer</option>
                                            <option value="Retired">Retired</option>
                                            <option value="Other">Other</option>
                                    </select>
							</div>
							<div class="col-md-3">
								<label for="father_income">Yearly Income <span class="text-danger">*</span></label>
								<input parsley-trigger="change" type="text" required
								name="father_income" class="form-control" id="father_income" value="{{$students?$students->father_income:''}}">
							</div>
							
							<div class="col-md-3">
								<label for="mother_name">Mother Name <span class="text-danger">*</span></label>
								<input parsley-trigger="change" type="text" required
								name="mother_name" class="form-control" id="mother_name" value="{{$students?$students->mother_name:''}}">
							</div>
							<div class="col-md-3">
								<label for="mother_mobile">Mobile No. </label>
								<input name="mother_mobile" type="text" required class="form-control" id="mother_mobile" value="{{$students?$students->mother_mobile:''}}">
							</div>
							<div class="col-md-3">
								<label for="mother_occupation">Occupation <span class="text-danger">*</span></label>
                                    <select class="form-control" name="mother_occupation" id="mother_occupation">
                                            <option  {{$students?($students->mother_occupation=="Homemaker"?"selected":''):''}} value="Homemaker">Homemaker</option>
                                            <option  {{$students?($students->mother_occupation=="Private Service Holder"?"selected":''):''}} value="Private Service Holder">Private Service Holder</option>
                                            <option  {{$students?($students->mother_occupation=="Govt Service Holder"?"selected":''):''}} value="Govt Service Holder">Govt Service Holder</option>
                                            <option  {{$students?($students->mother_occupation=="Businessman"?"selected":''):''}} value="Businessman">Businessman</option>
                                            <option  {{$students?($students->mother_occupation=="Retired"?"selected":''):''}} value="Retired">Retired</option>
                                            <option  {{$students?($students->mother_occupation=="Other"?"selected":''):''}} value="Other">Other</option>
                                    </select>
							</div>
						</div>

						
						<div class="row">
							<div class="col-md-3">
								<label for="guardian_name">Guardian Name <span class="text-danger">*</span></label>
								<input parsley-trigger="change" type="text" required
								name="guardian_name" class="form-control" id="guardian_name" value="{{$students?$students->guardian_name:''}}">
							</div>
							<div class="col-md-3">
								<label for="guardian_mobile">Mobile No. <span class="text-danger">*</span></label>
								<input parsley-trigger="change" type="text" required
								name="guardian_mobile" class="form-control" id="guardian_mobile" value="{{$students?$students->guardian_mobile:''}}">
							</div>
							<div class="col-md-3">
								<label for="guardian_occupation">Occupation <span class="text-danger">*</span></label>
                                    <select class="form-control" name="guardian_occupation" id="guardian_occupation">
                                            <option  {{$students?($students->guardian_occupation=="Private Service Holder"?"selected":''):''}} value="Private Service Holder">Private Service Holder</option>
                                            <option  {{$students?($students->guardian_occupation=="Govt Service Holder"?"selected":''):''}} value="Govt Service Holder">Govt Service Holder</option>
                                            <option  {{$students?($students->guardian_occupation=="Businessman"?"selected":''):''}} value="Businessman">Businessman</option>
                                            <option  {{$students?($students->guardian_occupation=="Homemaker"?"selected":''):''}} value="Homemaker">Homemaker</option>
                                            <option  {{$students?($students->guardian_occupation=="Farmer"?"selected":''):''}} value="Farmer">Farmer</option>
                                            <option  {{$students?($students->guardian_occupation=="Retired"?"selected":''):''}} value="Retired">Retired</option>
                                            <option  {{$students?($students->guardian_occupation=="Other"?"selected":''):''}} value="Other">Other</option>
									</select>
							</div>
							<div class="col-md-3">
								<label for="guardian_relation">Relation <span class="text-danger">*</span></label>
								<select class="form-control" name="guardian_relation" id="guardian_relation">
                                        <option {{$students?($students->guardian_relation=="Father"?"selected":''):''}} value="Father">Father</option>
                                        <option {{$students?($students->guardian_relation=="Mother"?"selected":''):''}} value="Mother">Mother</option>
                                        <option {{$students?($students->guardian_relation=="Brother"?"selected":''):''}} value="Brother">Brother</option>
                                        <option {{$students?($students->guardian_relation=="Sister"?"selected":''):''}} value="Sister">Sister</option>
                                        <option {{$students?($students->guardian_relation=="Husband"?"selected":''):''}} value="Husband">Husband</option>
                                        <option {{$students?($students->guardian_relation=="Neighbor"?"selected":''):''}} value="Neighbor">Neighbor</option>
                                        <option {{$students?($students->guardian_relation=="Other"?"selected":''):''}} value="Other">Other</option>
                                </select>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-md-3">
								<label for="class_id">Class <span class="text-danger">*</span></label>
                                    <select  data-toggle="select2" class="form-control" name="class_id" id="class_id">
										<option value="">Select Course</option>
                                        @foreach($courses as $course)
										<option {{$students?($students->course_id==$course->id?"selected":''):''}} value="{{ $course->id }}">{{ $course->course_name }}</option>
                                    @endforeach
									</select>
							</div>
							
							<div class="col-md-3">
								<label for="group_id">Group <span class="text-danger">*</span></label>
                                    <select  data-toggle="select2" class="form-control" name="group_id" id="group_id"></select>
							</div>
							
							<div class="col-md-3">
								<label for="session_id">Session <span class="text-danger">*</span></label>
                                    <select data-toggle="select2" class="form-control" name="session_id" id="session_id"></select>
							</div>
							
							<div class="col-md-3">
								<label for="section_id">Section <span class="text-danger">*</span></label>
								<select data-toggle="select2" class="form-control" name="section_id" id="section_id">
									@foreach($sections as $value)
										<option {{$students?($students->section_id==$value->id?"selected":''):''}} value="{{ $value->id }}">{{ $value->section_name }}</option>
									@endforeach
                                </select>
							</div>
							

							
						</div>

						<div class="row">


							<div class="col-md-3">
								<label for="roll_no">Roll No. <span class="text-danger">*</span></label>
								<input  type="text" required name="roll_no" class="form-control" id="roll_no" value="{{$students?$students->roll_no:''}}">
							</div>
						</div>
						
						<div class="row">
                            <div class="col-md-3">
								<label for="student_photo">Student Photo</label>
								<input  type="file"  name="student_photo" class="form-control" id="student_photo">
							</div>
                            <div class="col-md-3">
								<label for="guardian_photo">Guardian Photo</label>
								<input  type="file" name="guardian_photo" class="form-control" id="guardian_photo">
							</div>
							
						</div>
						
						<div class="form-group text-right mb-0">
							<button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
								Save
							</button>
						</div>
						
					</form>
				</div> <!-- end card-box -->
			</div>
			<!-- end col -->
			
		</div>
		<!-- end row -->
		
		
	</div> <!-- container-fluid -->
	
</div> <!-- content -->

<style>
        input,select,textarea{
                margin-bottom: 8px;
        }
</style>

@endsection
