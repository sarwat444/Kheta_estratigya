@extends('instructors.layouts.app')

@push('title',__('instructor-dashboard.My Profile'))

@push('styles')@endpush

@section('content')

    <h4 class="dashboard-title">{{__('instructor-dashboard.My Profile')}}</h4>

    <div class="profile-information">
        <table class="table table-responsive table-bordered">
            <tbody>
            <tr>
                <th scope="row" style="width: 220px ">{{__('instructor-dashboard.Email')}}</th>
                <td>{{auth()->user()->email}}</td>
            </tr>
            <tr>
                <th scope="row" style="width: 220px ">{{__('instructor-dashboard.First Name')}}</th>
                <td>{{auth()->user()->first_name}} </td>
            </tr>
            <tr>
                <th scope="row" style="width: 220px ">{{__('instructor-dashboard.Last Name')}}</th>
                <td>{{auth()->user()->last_name}}</td>
            </tr>
            <tr>
                <th scope="row" style="width: 220px " >{{__('instructor-dashboard.Photo')}}</th>
                <td> <img class="img-thumbnail" src="{{auth()->user()->avatar}}" width="100" height="100" alt="image-profile"></td>
            </tr>
            <tr>
                <th scope="row" style="width: 220px " >{{__('instructor-dashboard.Courses Rating Avg')}}</th>
                <td> <p>{{$rateInfo->avg_rate}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="width: 220px ">{{__('instructor-dashboard.Total Students Rating')}}</th>
                <td><p>{{$rateInfo->total_student_rated}}</p></td>
            </tr>

            <tr>
                <th scope="row" style="width: 220px " >{{__('instructor-dashboard.courses Count')}}C</th>
                <td> <p>{{auth()->user()->courses()->count()}}</p></td>
            </tr>
            <tr>
                <th scope="row" style="width: 220px " >{{__('instructor-dashboard.My Bio')}}</th>
                <td>{{auth()->user()->profile?->bio}}</td>
            </tr>
            </tbody>
        </table>
        <a href="{{route('dashboard.instructors.profile.edit')}}" class="btn btn-primary section2-btn"><i class="fa fa-edit"></i>{{__('instructor-dashboard.Edit Profile')}}</a>
    </div>



@endsection

@push('scripts')@endpush
