<!-- Archive Filter Bars Start -->
<div class="archive-filter-bars">

    <div class="archive-filter-bar">
        <p>We found <span>101</span> courses available for you</p>
    </div>

    <div class="archive-filter-bar">

        <div class="filter-bar-wrapper">
            <span>See</span>
            <ul class="nav">
                <li>
                    <button class="grid-or-list active" data-bs-toggle="tab" data-bs-target="#grid"><i class="fas fa-th"></i></button>
                </li>
                <li>
                    <button class="grid-or-list" data-bs-toggle="tab" data-bs-target="#list"><i class="fas fa-bars"></i></button>
                </li>
                <li>
                    <a href="{{route('site.courses')}}"><i class="fas fa-sync"></i></a>
                </li>
            </ul>
            <button class="btn btn-light btn-hover-primary collapsed" data-bs-toggle="collapse"
                    data-bs-target="#collapseFilter">
                <i class="fal fa-filter"></i>
                Filters
            </button>
        </div>

    </div>

</div>
<!-- Archive Filter Bars End -->

<!-- Filter Collapse Start -->
<div class="filter-collapse collapse" id="collapseFilter">
    <div class="card card-body">
        <form id="form-filter" action="{{route('site.courses')}}" method="GET">
            <div class="row row-cols-xl-5 gy-6">
                @include('site.courses.partials.filters-components.category')
                @include('site.courses.partials.filters-components.instructor')
                @include('site.courses.partials.filters-components.level')
                @include('site.courses.partials.filters-components.price')
                @include('site.courses.partials.filters-components.rating')
                @include('site.courses.partials.filters-components.duration')
                @include('site.courses.partials.filters-components.sort-by')
            </div>
            <div class="row mt-4">
                <div class="col-2">
                    <button type="submit" class="btn btn-primary btn-hover-secondary w-100">Filter</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Filter Collapse End -->
