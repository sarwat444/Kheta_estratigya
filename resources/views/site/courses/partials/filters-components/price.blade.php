<div class="col-xl col-lg-3 col-md-4 col-sm-6">

    <!-- Widget Filter Start -->
    <div class="widget-filter">
        <h4 class="widget-filter__title">Price</h4>

        <!-- Widget Filter Wrapper Start -->
        <div class="widget-filter__wrapper widgetScroll">
            <ul class="widget-filter__list">
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="radio" id="free" value="free"
                               name="price" {{(request()->input('price') === 'free') ? 'checked' : ''}}>
                        <label for="free">Free</label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="radio" id="paid" value="paid"
                               name="price" {{(request()->input('price') === 'paid') ? 'checked' : ''}}>
                        <label for="paid">Paid</label>
                    </div>
                    <!-- Widget Filter Item End -->
                </li>
            </ul>
        </div>
        <!-- Widget Filter Wrapper End -->
    </div>
    <!-- Widget Filter End -->

</div>
