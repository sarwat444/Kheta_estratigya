<div class="col-xl col-lg-3 col-md-4 col-sm-6">

    <!-- Widget Filter Start -->
    <div class="widget-filter">
        <h4 class="widget-filter__title">Instructor</h4>

        <!-- Widget Filter Wrapper Start -->
        <div class="widget-filter__wrapper widgetScroll">
            <ul class="widget-filter__list">
                @foreach($instructors as $instructor)
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="checkbox" id="instructor_{{$instructor->id}}" value="{{$instructor->id}}" name="instructor[]" {{(in_array($instructor->id,(array) request()->input('instructor'))) ? 'checked' : ''}}>
                        <label for="instructor_{{$instructor->id}}">{{$instructor->full_name}}</label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
                @endforeach
            </ul>
        </div>
        <!-- Widget Filter Wrapper End -->
    </div>
    <!-- Widget Filter End -->

</div>
