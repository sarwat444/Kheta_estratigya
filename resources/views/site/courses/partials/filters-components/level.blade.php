<div class="col-xl col-lg-3 col-md-4 col-sm-6">

    <!-- Widget Filter Start -->
    <div class="widget-filter">
        <h4 class="widget-filter__title">Level</h4>

        <!-- Widget Filter Wrapper Start -->
        <div class="widget-filter__wrapper widgetScroll">
            <ul class="widget-filter__list">
                @foreach(\App\Enums\CourseLevel::cases() as $level)
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="checkbox" id="level_{{$level->value}}" value="{{$level->value}}" name="level[]" {{(in_array($level->value,(array) request()->input('level'))) ? 'checked' : ''}}>
                        <label for="level_{{$level->value}}">{{$level->name}}</label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li >
                @endforeach
            </ul>
        </div>
        <!-- Widget Filter Wrapper End -->
    </div>
    <!-- Widget Filter End -->

</div>
