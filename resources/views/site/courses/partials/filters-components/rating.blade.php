<div class="col-xl col-lg-3 col-md-4 col-sm-6">

    <!-- Widget Filter Start -->
    <div class="widget-filter">
        <h4 class="widget-filter__title">Rating</h4>

        <!-- Widget Filter Wrapper Start -->
        <div class="widget-filter__wrapper widgetScroll">
            <ul class="widget-filter__list">
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="radio" id="rating_100" value="5" name="rate" {{(request()->input('rate') === '5') ? 'checked' : ''}}>
                        <label for="rating_100">
                        <span class="star-line">
                        <span class="star" style="width: 100%;"></span>
                        </span>
                        </label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="radio" id="rating_80" value="4" name="rate" {{(request()->input('rate') === '4') ? 'checked' : ''}}>
                        <label for="rating_80">
                        <span class="star-line">
                        <span class="star" style="width: 80%;"></span>
                        </span>
                        </label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="radio" id="rating_60" value="3" name="rate" {{(request()->input('rate') === '3') ? 'checked' : ''}}>
                        <label for="rating_60">
                        <span class="star-line">
                        <span class="star" style="width: 60%;"></span>
                        </span>
                        </label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="radio" id="rating_40" value="2" name="rate" {{(request()->input('rate') === '2') ? 'checked' : ''}}>
                        <label for="rating_40">
                        <span class="star-line">
                        <span class="star" style="width: 40%;"></span>
                        </span>
                        </label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="radio" id="rating_20" value="1" name="rate" {{(request()->input('rate') === '1') ? 'checked' : ''}}>
                        <label for="rating_20">
                        <span class="star-line">
                        <span class="star" style="width: 20%;"></span>
                        </span>
                        </label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
            </ul>
        </div>
        <!-- Widget Filter Wrapper End -->
    </div>
    <!-- Widget Filter End -->

</div>
