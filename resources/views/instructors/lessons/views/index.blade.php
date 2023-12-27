@extends('instructors.layouts.app')

@push('title','Lesson Views')

@push('styles')@endpush

@section('content')
    <h4 class="dashboard-title">Lesson Information</h4>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-xl-5">
                            <div class="product-detai-imgs">
                                <div class="row">
                                    <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                        @if($lesson->isVideo())
                                            {!! $lesson->embed !!}
                                        @else
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="product-1" role="tabpanel"
                                                     aria-labelledby="product-1-tab">
                                                    <a href="{{$lesson->embed}}" target="_blank"><img
                                                            src="{{asset('assets/admin/images/document/url-icon.png')}}"></a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7">
                            <h5 class="mb-3">Lesson Information :</h5>
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Lesson Title</th>
                                        <td>{{$lesson->title}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lesson Type</th>
                                        <td><span
                                                class="badge bg-primary">{{\App\Enums\LessonType::tryFrom($lesson->type)->name}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lesson Provider</th>
                                        <td><span
                                                class="badge bg-primary">{{\App\Enums\LessonProvider::tryFrom($lesson->provider)->name}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lesson Is Free</th>
                                        @if($lesson->isFree())
                                            <td><span class="badge bg-success">yes</span></td>
                                        @else
                                            <td><span class="badge bg-danger">no</span></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 400px;">Course Name</th>
                                        <td>{{$lesson->course->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Section Name</th>
                                        <td>{{$lesson->section->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Folder Name</th>
                                        <td>{{$lesson->folder->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">created at</th>
                                        <td>{{$lesson->created_at->format('Y-m-d')}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">last update</th>
                                        <td>{{$lesson->updated_at->format('Y-m-d')}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-announcement mt-10">
        <div class="dashboard-table table-responsive">
            <h6 class="m-1">Lesson Views</h6>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>View Time</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($lesson->views as $view)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$view->created_at->format('d-m-Y')}}</td>
                        <td>{{$view->user->name}}</td>
                        <td>{{$view->user->email}}</td>
                        <td>
                            <ul class="dashboard-table__list">
                                <li class="dropdown">
                                    <button class="dropdown-btn" data-bs-toggle="dropdown"><i
                                            class="far fa-ellipsis-v"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a href="{{route('dashboard.instructors.lessons.edit',1)}}"><i
                                                    class="fal fa-pencil-alt"></i> Edit</a></li>
                                        <li><a href="{{route('dashboard.instructors.lessons.show',1)}}"><i
                                                    class="fal fa-eye"></i> Show</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Views Found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('scripts')@endpush
