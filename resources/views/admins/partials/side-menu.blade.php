<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu" style="margin-top:45px">
                <li>
                    <a href="{{route('dashboard.index')}}">
                        <i class="bx bx-home"></i>
                        <span key="t-maps"> الأحصائيات </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('dashboard.objectives.index')}}">
                        <i class="bx bx-user-circle"></i>
                        <span key="t-maps">الغايات</span>
                    </a>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-crypto">أداره المستخدمين</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('dashboard.users.index')}}" key="t-wallet">الجهات</a></li>
                        <li><a href="{{route('dashboard.users.admins')}}" key="t-buy">مديري النظام</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('dashboard.mangements.index')}}">
                        <i class="bx bx-briefcase"></i>
                        <span key="t-maps">الأدارات</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
