@extends('frontend.layouts.app')
@section('title','Donor Profile')
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

        
        <div class="row">

            <div class=" col-md-offset-3 col-lg-6 col-md-6 col-sm-12 col-xs-12">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" @if(!Session::has('update_date')) class="active" @endif ><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Dashboard</a></li>
                    <li role="presentation" @if(Session::has('update_date')) class="active" @endif><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Donate History</a></li>
                    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Update Donate Date</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane @if(!Session::has('update_date')) active @endif" id="home">
                        
                        <table class="table">
                            <tr>
                                <td>Blood Group</td>
                                <td>:</td>
                                <td stu>{{$donor->blood->name}}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td>{{$donor->name}}</td>
                            </tr>
                            <tr>
                                <td>Mobile No</td>
                                <td>:</td>
                                <td>{{$donor->mobile}}</td>
                            </tr>
                            <tr>
                                <td>Email Address</td>
                                <td>:</td>
                                <td>{{$donor->email}}</td>
                            </tr>
                            <tr>
                                <td>District</td>
                                <td>:</td>
                                <td>{{$donor->district->name}}</td>
                            </tr>
                            <tr>
                                <td>Address/Location</td>
                                <td>:</td>
                                <td>{{$donor->area}}</td>
                            </tr>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane @if(Session::has('update_date')) active @endif" id="profile">
                        @if(Session::has('update_date'))
                        <div class="alert alert-success"> {{ Session::get('update_date') }}</div>
                        @endif
                        <table class="table table-bordered table-striped table-hovered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Hospital/Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donates as $key=>$item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ date("D d F, Y",strtotime($item->donate_date))}}</td>
                                    <td>{{$item->location}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">
                        
                        <form class="appoinment-form" method="post" action="{{ route("update-donor-date") }}">
                            @csrf
                            
                            <div class="form-group col-md-6">
                                <label style="color:#969595">Last Donate Date <span class="text-danger">*</span></label>
                                <input name="date" class="form-control" type="date" autofocus required>
                            </div>
    
                            <div class="form-group col-md-6 ">
                                <label style="color:#969595">Hospital/Location </label>
                                <input name="loaction" class="form-control" type="text" placeholder="Type hospital or location">
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12 text-center">
                                <button id="btn_submit" style="width: 50%;" class="btn-submit" type="submit">Save</button>
                            </div>
    
                        </form>
                    </div>
                </div>

                <div class="text-center">
                    <p>
                        <a id="btn_submit" href="{{ logout('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="width: 50%;" class="btn-submit" >Logout</a>
                    </p>
                    <form id="logout-form" action="{{ logout('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>

                </div>
            </div>
        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!--  end .section-our-team -->

@endsection