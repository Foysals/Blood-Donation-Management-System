@extends('frontend.layouts.app')
@section('title',$group.' Donors')
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

            <div class="col-md-12">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">SL</th>
                        <th>Donor Name</th>
                        <th class="text-center">Mobile No</th>
                        <th>District</th>
                        <th>Location</th>
                        <th class="text-center">Last Donate Date</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($donors)>0)
                        @foreach ($donors as $key=>$item)
                   
                            <tr>
                                <td class="text-center">{{ $key+1}}</td>
                                <td>{{ $item->name }}</td>
                                <td class="text-center">{{ $item->mobile }}</td>
                                <td>{{ $item->district->name }}</td>
                                <td>{{ $item->area }}</td>
                                <td class="text-center">
                                    @if($item->last_donate_date)
                                    {{ date("d F, Y",strtotime($item->last_donate_date)) }}@else No update yet @endif
                                    </td>
                            </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center" colspan="6"> 😞 Sorry!!! No donor found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div> <!-- end .row  -->

    </div> <!-- end .container  -->

</section> <!--  end .section-our-team -->

@endsection