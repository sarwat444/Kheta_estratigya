<!-- Dashboard Nav Start -->
<div class="dashboard-nav offcanvas offcanvas-start" id="offcanvasDashboard">

    <!-- Dashboard Nav Wrapper Start -->
    <div class="dashboard-nav__wrapper">
        <!-- Dashboard Nav Header Start -->
        <div class="offcanvas-header dashboard-nav__header dashboard-nav-header">

            <div class="dashboard-nav__toggle d-xl-none">
                <button class="toggle-close" data-bs-dismiss="offcanvas"><i class="fal fa-times"></i></button>
            </div>

            <div class="dashboard-nav__logo">
                <a class="logo" href="index-main.html"><img
                        src="{{asset('/assets/instructor/images/dark-logo.png')}}" alt="Logo" width="148"
                        height="62"></a>
            </div>

        </div>
        <!-- Dashboard Nav Header End -->

        <!-- Dashboard Nav Content Start -->
        <div class="offcanvas-body dashboard-nav__content navScroll">

            <!-- Dashboard Nav Menu Start -->
            <div class="dashboard-nav__menu">
                <ul class="dashboard-nav__menu-list">
                    <li>
                        <a href="{{route('dashboard.instructors.index')}}">
                            <i class="fa fa-home"></i>
                            <span class="text">{{__('instructor-dashboard.Dashboard')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.instructors.courses.index')}}">
                            <i class="fa fa-video-plus"></i>
                            <span class="text">{{__('instructor-dashboard.My Courses')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.instructors.sections.index')}}">
                            <i class="fa fa-list"></i>
                            <span class="text">{{__('instructor-dashboard.My Sections')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.instructors.lessons.index')}}">
                            <i class="fa fa-file-video"></i>
                            <span class="text">{{__('instructor-dashboard.My Lessons')}}</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.instructors.profile.index')}}">
                            <i class="edumi edumi-follower"></i>
                            <span class="text">{{__('instructor-dashboard.My Profile')}}</span>
                        </a>
                    </li>
                </ul>
                <ul class="dashboard-nav__menu-list">
                    <li>
                        <form action="{{route('users.logout')}}" method="post" id="logout-form">
                            @csrf
                        </form>
                        <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit()">
                            <i class="edumi edumi-sign-out"></i>
                            <span class="text">{{__('instructor-dashboard.Logout')}}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Dashboard Nav Menu End -->

        </div>
        <!-- Dashboard Nav Content End -->

        <div class="offcanvas-footer"></div>
    </div>
    <!-- Dashboard Nav Wrapper End -->

</div>
<!-- Dashboard Nav End -->
