<div class="col-xl col-lg-3 col-md-4 col-sm-6">

    <!-- Widget Filter Start -->
    <div class="widget-filter">
        <h4 class="widget-filter__title">Filter by duration</h4>

        <!-- Widget Filter Wrapper Start -->
        <div class="widget-filter__wrapper widgetScroll">
            <ul class="widget-filter__list">
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="radio" id="duration1" value="less_than_2_hours"
                               name="duration" {{(request()->input('duration') === 'less_than_2_hours') ? 'checked' : ''}}>
                        <label for="duration1">Less than 2 hours</label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="radio" id="duration2" value="between_3_and_6_hours"
                               name="duration" {{(request()->input('duration') === 'between_3_and_6_hours') ? 'checked' : ''}}>
                        <label for="duration2">3 - 6 hours</label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="radio" id="duration3" value="between_7_and_16_hours"
                               name="duration" {{(request()->input('duration') === 'between_7_and_16_hours') ? 'checked' : ''}}>
                        <label for="duration3">7 - 16 hours</label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="radio" id="duration4" value="greater_than_17_hours"
                               name="duration" {{(request()->input('duration') === 'greater_than_17_hours') ? 'checked' : ''}}>
                        <label for="duration4">17+ Hours</label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
            </ul>
        </div>
        <!-- Widget Filter Wrapper End -->
    </div>
    <!-- Widget Filter End -->

</div>
