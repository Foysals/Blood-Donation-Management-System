@extends('layouts.app')
@section('title','Print')
@section('style')


    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <style type="text/css">

        @media print {
            #printthis {
                /* margin: 10px 0 !important;*/

            }
            #teacher_list{
                margin:0 15px;
            }
            #teacher_list td{
                padding:7px 5px;
            }
        }
        @page {
            size: legal portrait;
        }

        @media all {
            .page-break	{ display: none; }
        }

        .page-break	{ page-break-before: always; }


        .logo_img {
            margin-bottom: .5rem;
            margin-right: .5rem;
            overflow: hidden;
        }
    </style>
@endsection
@section('content')

    <div id="printsection">
        <button id="print" class="btn btn-outline-secondary float-right" style="margin: 10px" onclick="myPrint()"> <span class="fa fa-print"> Print</span> </button>
        <a id="backto" class="btn btn-outline-success float-right" style="margin: 10px"  href="{{ route('students') }}"><span class="fa fa-arrow-left"> Back</span></a>
        <div style="clear: both;"> </div>
        <div id="printthis" class="printthis">



            <div class="row" >
                <style>
                    .mytable td{
                        vertical-align: middle;
                    }
                    #teacher_list td,#teacher_list  th{
                        border: 1px solid #000 !important;
                        color: #000;
                    }
                    #teacher_list thead th{
                        vertical-align: middle;
                    }
                </style>
                <div class="col-12">

                    <table style="width: 100%">
                        <tr>
                            <td style="width: 90%;text-align: center;padding-right: 120px;"><h5 class="text-blue"><b>Student List</b></h5></td>
                        </tr>
                    </table>

                    <br>
                    @if(count($students)>0)
                    <table class="table mytable">
                        <tr>
                            <td><b>Class:</b> {{ $students[0]->courses->course_name }} </td>
                            <td><b>Group:</b> @if($students[0]->groups) {{ $students[0]->groups->group_name }} @else None @endif </td>
                            <td><b>Session:</b> @if($students[0]->sessions) {{ $students[0]->sessions->session_name }} @endif </td>
                            <td><b>Section:</b> @if($students[0]->sections) {{ $students[0]->sections->section_name }} @endif </td>

                        </tr>
                    </table>
                        @endif
                </div>
                <table class="table" id="teacher_list" style="margin-bottom: 0">
                    <thead>
                    <tr style="text-align: center">
                        <th>SL. No</th>
                        <th>User ID</th>
                        <th>Student Name<br>Father's Name<br>Mother's Name</th>
                        <th>Roll No</th>
                        <th>DOB<br>Gender</th>
                        <th>Guardian Name <br> Mobile Number</th>
                        <th>Picture</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($students)==0)
                       <tr>
                           <td class="text-center" colspan="7">Data does not exist</td>
                       </tr>
                    @else
                        @foreach($students as $key=>$student)
                            <tr style="text-align: center">
                                <td>{{$key+1}}</td>
                                <td>{{$student->login_id}}</td>
                                <td style="text-align: left;">
                                    {{$student->student_name}}<br>
                                    {{$student->father_name}}<br>
                                    {{$student->mother_name}}
                                </td>
                                <td>{{$student->roll_no}}</td>
                                <td>{{ date("d/m/Y", strtotime($student->dob)) }}<br>{{ $student->gender }}</td>

                                <td>{{$student->guardian_name}} <br>{{$student->guardian_mobile}}</td>
                                <td>@if($student->student_photo)
                                        <img height="50px" width="50px" src="images/students/{{$student->student_photo}}"
                                             class="img-rounded"
                                             alt="Photo">
                                @endif
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="7" style="    border: none !important;">
                            <h6 style="text-align: center">{{ config('constants.software.name') }} - {{ config('constants.system.type') }}</h6>



                            <h6 style="text-align: center">Developed & Managed By- {{ config('constants.developer.name') }}</h6>
                        </td>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>

    </div>

@endsection


@section('script')

    <script>

        function myPrint() {
            var printContents = document.getElementById("printthis").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
            window.location.reload()
        }

    </script>



@endsection




