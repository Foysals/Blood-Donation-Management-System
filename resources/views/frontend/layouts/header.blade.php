 <!--  HEADER -->

        <header class="main-header clearfix" data-sticky_header="true">

            <div class="top-bar clearfix">

                <div class="container">

                    <div class="row">

                        <div class="col-md-8 col-sm-12">

                            <p>Welcome to blood donation center.</p>

                        </div>

                        <div class="col-md-4col-sm-12">
                            <div class="top-bar-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>

                    </div>

                </div> <!--  end .container -->

            </div> <!--  end .top-bar  -->

            <section class="header-wrapper navgiation-wrapper">

                <div class="navbar navbar-default">
                    <div class="container">

                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="logo" href="{{ url("/") }}"><img alt="" src="images/logo.png"></a>
                        </div>

                        <div class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{ url("/") }}">Home</a></li>
                                <li>
                                    <a href="#">Donor List</a>
                                    <ul class="drop-down">
                                        @foreach ($bloods as $item)            
                                        <li><a href="{{ (url('donors',$item->short)) }}">{{$item->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ route("search") }}">Donor Search</a></li>
                                @if(auth()->user())
                                <li><a href="{{ route("profile") }}">Dashboard</a></li>
                                @else
                                <li><a href="{{ route("registration") }}">Be A Donor</a></li>
                                <li><a href="{{ route("login") }}">Login</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

            </section>

        </header> <!-- end main-header  -->

        <!--  HOME SLIDER BLOCK  -->