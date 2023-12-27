<div class="top-navbar">
    <div class="container">
        <div class="sl-nav float-end">
            <ul>
                <li><b>{{app()->getLocale() === 'en' ? 'English' : 'Deutsch'}}</b> <i class="fa fa-angle-down" aria-hidden="true"></i>
                    <div class="triangle"></div>
                    <ul>
                        <li><a href="{{route('language','de')}}"><i class="sl-flag flag-de">
                                    <div id="germany"></div>
                                </i> <span @class(['active' => app()->getLocale() === 'de'])>Deutsch</span></a></li>
                        <li><a href="{{route('language','en')}}"><i class="sl-flag flag-usa">
                                    <div id="germany"></div>
                                </i><span @class(['active' => app()->getLocale() === 'en'])>English</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
