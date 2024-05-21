<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>@yield("title") - {{config('constants.software.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Blood Donation - Activism & Campaign HTML5 Template">
    <meta name="author" content="xenioushk"/>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />

    <!-- The styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/venobox.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />

<body>


    <div id="preloader">
        <span class="margin-bottom"><img src="images/loader.gif" alt="" /></span>
    </div>

@include("frontend.layouts.header")



@yield("content")

        <!-- START FOOTER  -->

        <footer>


            <!--FOOTER CONTENT  -->

            <section class="footer-contents">

                <div class="container">

                    <div class="row clearfix">

                        <div class="col-md-12 col-sm-12">
                            <p class="copyright-text text-center"> Copyright &copy; {{ date("Y") }}, All Right Reserved - by {{ config('constants.developer.name') }} </p>

                        </div>  <!-- end .col-sm-6  -->



                    </div> <!-- end .row  -->

                </div> <!--  end .container  -->

            </section> <!--  end .footer-content  -->

        </footer>

        <!-- END FOOTER  -->

        <!-- Back To Top Button  -->

        <a id="backTop">Back To Top</a>

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <script src="{{ asset('js/jquery.backTop.min.js') }}"></script>
        <script src="{{ asset('js/waypoints.min.js') }}"></script>
        <script src="{{ asset('js/waypoints-sticky.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('js/venobox.min.js') }}"></script>
        <script src="{{ asset('js/custom-scripts.js') }}"></script>
</body>


</html>