<div class="col-xl col-lg-3 col-md-4 col-sm-6">

    <!-- Widget Filter Start -->
    <div class="widget-filter">
        <h4 class="widget-filter__title">Categories</h4>

        <!-- Widget Filter Wrapper Start -->
        <div class="widget-filter__wrapper widgetScroll">
            <ul class="widget-filter__list">
                @foreach($categories as $category)
                <li>
                    <!-- Widget Filter Item Start -->
                    <div class="widget-filter__item">
                        <input type="checkbox" id="category_{{$category->id}}" value="{{$category->id}}" name="category[]" {{(in_array($category->id,(array) request()->input('category'))) ? 'checked' : ''}}>
                        <label for="category_{{$category->id}}">{{$category->name}}</label>
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
