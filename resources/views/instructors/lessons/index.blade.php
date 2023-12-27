@extends('instructors.layouts.app')

@push('title',__('instructor-dashboard.Lessons'))

@push('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <h4 class="dashboard-title">{{__('instructor-dashboard.Lessons')}}</h4>
    <a href="{{route('dashboard.instructors.lessons.create',['type' => 'document'])}}" class="btn btn-success btn-sm m-2 section-btn"><i class="fa fa-plus"></i>{{__('instructor-dashboard.Create Document')}}</a>
    <a href="{{route('dashboard.instructors.lessons.create',['type' => 'video'])}}" class="btn btn-primary btn-sm m-2 section2-btn"> <i class="fa fa-plus"></i>{{__('instructor-dashboard.Create Video')}}</a>
    <div class="dashboard-announcement">
        <div class="dashboard-table table-responsive">
            <table class="table table-striped" id="myTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('instructor-dashboard.Lesson Title')}}</th>
                    <th>{{__('instructor-dashboard.Course Name')}}</th>
                    <th>{{__('instructor-dashboard.Section Name')}}</th>
                    <th>{{__('instructor-dashboard.Folder Name')}}</th>
                    <th>{{__('instructor-dashboard.Type')}}</th>
                    <th>{{__('instructor-dashboard.Provider')}}</th>
                    <th>{{__('instructor-dashboard.Free')}}</th>
                    <th>{{__('instructor-dashboard.Publish')}}</th>
                    <th>{{__('instructor-dashboard.Action')}}</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($lessons as $lesson)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$lesson->title}}</td>
                            <td>{{$lesson->course->name}}</td>
                            <td>{{$lesson->section->name}}</td>
                            <td>{{$lesson->folder?->name}}</td>
                            <td><span class="badge bg-primary">{{\App\Enums\LessonType::tryFrom($lesson->type)->name}}</span></td>
                            <td><span class="badge bg-primary">{{\App\Enums\LessonProvider::tryFrom($lesson->provider)->name}}</span></td>
                            <td><span class="badge bg-{{ ($lesson->isFree()) ? 'success' : 'danger' }}">{{ ($lesson->isFree()) ? 'yes' : 'no' }}</span></td>
                            <td><span class="badge bg-{{ ($lesson->isPublish()) ? 'success' : 'danger' }}">{{ ($lesson->isPublish()) ? 'yes' : 'no' }}</span></td>
                            <td>
                                <ul class="dashboard-table__list">
                                    <li class="dropdown">
                                        <button class="dropdown-btn" data-bs-toggle="dropdown"><i
                                                class="far fa-ellipsis-v"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="{{route('dashboard.instructors.lessons.edit',$lesson->id)}}"><i
                                                        class="fal fa-pencil-alt"></i>{{__('instructor-dashboard.Edit')}}</a></li>
                                            <li><a href="{{route('dashboard.instructors.lessons.show',$lesson->id)}}"><i
                                                        class="fal fa-eye"></i>{{__('instructor-dashboard.Show')}}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">{{__('instructor-dashboard.No Lessons Found')}}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    @include('instructors.lessons.scripts.datatable-init')
@endpush
