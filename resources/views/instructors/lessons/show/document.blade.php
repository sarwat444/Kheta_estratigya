@extends('instructors.layouts.app')

@push('title',__('instructor-dashboard.Document Lesson'))

@push('styles')@endpush

@section('content')
    <h4 class="dashboard-title">{{__('instructor-dashboard.Document Lesson')}}</h4>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="col-xl-5">
                            <div class="product-detai-imgs">
                                <div class="row">
                                    <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="product-1" role="tabpanel"
                                                 aria-labelledby="product-1-tab">
                                                <a href="{{$lesson->embed}}" target="_blank"><img
                                                        src="{{asset('assets/admin/images/document/url-icon.png')}}"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7">
                            <h5 class="mb-3">{{__('instructor-dashboard.Lesson Information')}}</h5>
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered">
                                    <tbody>
                                    <tr>
                                        <th scope="row">{{__('instructor-dashboard.Lesson Title')}}</th>
                                        <td>{{$lesson->title}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{__('instructor-dashboard.Lesson Type')}}</th>
                                        <td><span
                                                class="badge bg-primary">{{\App\Enums\LessonType::document->name}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{__('instructor-dashboard.Lesson Provider')}}</th>
                                        <td><span
                                                class="badge bg-primary">{{\App\Enums\LessonProvider::url->name}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{__('instructor-dashboard.Is Free')}}</th>
                                        @if($lesson->isFree())
                                            <td><span class="badge bg-success">{{__('instructor-dashboard.yes')}}</span></td>
                                        @else
                                            <td><span class="badge bg-danger">{{__('instructor-dashboard.no')}}</span></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th scope="row" style="width: 400px;">{{__('instructor-dashboard.Course Name')}}</th>
                                        <td>{{$lesson->course->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{__('instructor-dashboard.Section Name')}}</th>
                                        <td>{{$lesson->section->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{__('instructor-dashboard.Folder Name')}}</th>
                                        <td>{{$lesson->folder->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{__('instructor-dashboard.created at')}}</th>
                                        <td>{{$lesson->created_at->format('Y-m-d')}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">{{__('instructor-dashboard.last update')}}</th>
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

@endsection

@push('scripts')@endpush
