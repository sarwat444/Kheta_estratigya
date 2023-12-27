@extends('instructors.layouts.app')

@push('title',__('instructor-dashboard.Sections'))

@push('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <h4 class="dashboard-title">{{__('instructor-dashboard.Sections')}}</h4>
    <a href="{{route('dashboard.instructors.sections.create')}}" class="btn btn-success btn-sm m-2 section-btn"> <i
            class="fa fa-plus"></i>{{__('instructor-dashboard.New Section')}}</a>
    <div class="dashboard-announcement">
        <div class="dashboard-table table-responsive" style="padding:20px;">
            <table id="myTable" class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{__('instructor-dashboard.Section Name')}}</th>
                    <th>{{__('instructor-dashboard.Course Name')}}</th>
                    <th>{{__('instructor-dashboard.Lesson Count')}}</th>
                    <th>{{__('instructor-dashboard.Action')}}</th>
                </tr>
                </thead>
                <tbody>
                @forelse($sections as $section)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            {{$section->name}}
                        </td>
                        <td>
                            {{$section->course->name}}
                        </td>
                        <td>
                            <span class="badge bg-primary">{{$section->lessons_count}}</span>
                        </td>
                        <td>
                            <ul class="dashboard-table__list">
                                <li class="dropdown">
                                    <button class="dropdown-btn" data-bs-toggle="dropdown"><i
                                            class="far fa-ellipsis-v"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a href="{{route('dashboard.instructors.sections.edit',$section->id)}}"><i
                                                    class="fal fa-pencil-alt"></i>{{__('instructor-dashboard.Edit')}}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">{{__('instructor-dashboard.No Sections Found')}}</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    @include('instructors.sections.scripts.datatable-init')
@endpush
