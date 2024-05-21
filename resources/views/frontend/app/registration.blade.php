@extends('frontend.layouts.app')
@section('title','Registration')
@section("content")
        <!--  PAGE HEADING -->

<section class="page-header" style="padding:28px 0 15px 0 !important;">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-center">

                {{--<h3>--}}
                    {{--@yield("title")--}}
                {{--</h3>--}}

                <p class="page-breadcrumb">
                    <a href="{{ url("/") }}">Home</a> / @yield("title")
                </p>


            </div>

        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!-- end .page-header  -->

<!-- TEAM SECTION -->

<section class="section-content-block section-our-team">

    <div class="container wow fadeInUp">

        <div class="row section-heading-wrapper">

            <div class="col-md-12 col-sm-12 text-center">
                <h2 class="section-heading">@yield("title")</h2>
                <p class="section-subheading">Call the donor, if four months are completed since the blood donor's last blood donation</p>
            </div> <!-- end .col-sm-10  -->

        </div> <!-- end .row  -->

        <div class="row">

            <div class=" col-md-offset-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">

                <div class="appointment-form-wrapper  clearfix" style="margin-top:0;">
                    <h3 class="join-heading text-center">Donor Form</h3>
                    <form class="appoinment-form" action="{{ route("be_a_donor") }}" method="post">
                        @csrf
                        <div class="form-group col-md-6">
                            <label style="color:#969595">Name <span class="text-danger">*</span></label>
                            <input name="name" class="form-control" type="text" placeholder="Type your name..." required>
                        </div>
                        <div class="form-group col-md-6">
                            <label style="color:#969595">Mobile Number <span class="text-danger">*</span></label>
                            <input name="mobile" class="form-control" type="text" placeholder="Type your mobile no..." required>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label style="color:#969595">Email Address <span class="text-danger">*</span></label>
                            <input name="email" class="form-control" type="email" placeholder="Type your email..." required>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="select-style">
                                <label style="color:#969595">Blood Group <span class="text-danger">*</span></label>
                                <select class="form-control" name="blood_group_id" required>
                                    @foreach ($bloods as $item)                                        
                                    <option value="{{ $item->id }}">{{$item->name}}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label style="color:#969595">District <span class="text-danger">*</span></label>
                            <div class="select-style">
                                <select class="form-control" name="district_id" required>
                                    <option>Select None</option>
                                    @foreach ($districts as $item)
                                        <option value="{{ $item->id }}">{{ $item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group col-md-12">
                            <label style="color:#969595">Area <span class="text-danger">*</span></label>
                            <textarea name="area" class="form-control" placeholder="Type your area/location" required></textarea>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12 text-center">
                            <button id="btn_submit" class="btn-submit" type="submit">Be A Donor</button>
                        </div>

                    </form>

                </div> <!-- end .appointment-form-wrapper  -->

            </div>
        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!--  end .section-our-team -->

@endsection