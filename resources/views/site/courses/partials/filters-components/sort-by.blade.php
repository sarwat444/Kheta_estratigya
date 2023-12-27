<div class="col-xl col-lg-3 col-md-4 col-sm-6">

    <!-- Widget Filter Start -->
    <div class="widget-filter">
        <h4 class="widget-filter__title">Sort by</h4>

        <!-- Widget Filter Wrapper Start -->
        <div class="widget-filter__wrapper widgetScroll">
            <ul class="widget-filter__list">
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="radio" id="radio1" value="latest"
                               {{(request()->input('sort') === 'latest') ? 'checked' : ''}} name="sort">
                        <label for="radio1">Latest</label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="radio" id="radio2" value="oldest"
                               {{(request()->input('sort') === 'oldest') ? 'checked' : ''}} name="sort">
                        <label for="radio2">Oldest</label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="radio" id="radio3" value="title_asc"
                               {{(request()->input('sort') === 'title_asc') ? 'checked' : ''}} name="sort">
                        <label for="radio3">Course Title (a-z)</label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="radio" id="radio4" value="title_desc"
                               {{(request()->input('sort') === 'title_desc') ? 'checked' : ''}} name="sort">
                        <label for="radio4">Course Title (z-a)</label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
            </ul>
        </div>
        <!-- Widget Filter Wrapper End -->
    </div>
    <!-- Widget Filter End -->

</div>
