  <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li>
                                <a href="{{ route("home") }}">
                                    <i class="dripicons-meter"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            @if(Auth::user()->user_type==1)
                            <li>
                                <a href="{{ route("history") }}">
                                    <i class="dripicons-meter"></i>
                                    <span> Donate Records </span>
                                </a>
                            </li>
                            <li>
                            <a href="{{ url('#') }}">
                            <i class="dripicons-flag"></i>
                            
                                <span>Print Certificate</span>
                            </a>
                        </li>

                            @endif
                            @if(Auth::user()->user_type==2)
                                <li>
                                    <a href="{{ route("history") }}">
                                        <i class="dripicons-meter"></i>
                                        <span> New Registratroin </span>
                                    </a>
                                </li>
                            @endif
                      
                        {{--<li class="menu-title">Components</li>--}}

{{--<li>--}}
    {{--<a href="javascript: void(0);">--}}
        {{--<i class="dripicons-user"></i>--}}
        {{--<span> Students </span>--}}
        {{--<span class="menu-arrow"></span>--}}
    {{--</a>--}}
    {{--<ul class="nav-second-level" aria-expanded="false">--}}
        {{--<li>--}}
            {{--<a href="{{ url("students") }}">Student List</a>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<a href="{{ url("add-student") }}">Add Student</a>--}}
        {{--</li>--}}
    {{--</ul>--}}
{{--</li>--}}
</ul>

</div>
                        </ul>
        
                   
                    </div>
                 

                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
