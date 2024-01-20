@extends('gehat.layouts.app')

@push('title','المؤشرات')

@push('styles')
    <link href="{{asset(PUBLIC_PATH.'/assets/admin/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- DataTables -->
    <link href="{{asset(PUBLIC_PATH.'/assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset(PUBLIC_PATH.'/assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset(PUBLIC_PATH.'/assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

@endpush
@section('content')

    @php
        $selectedYear = config('app.selected_year');
    @endphp

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">{{--@if(!empty($mokashert)) {{ $mokashert[0]->program->program }}@endif --}}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{--@if(!empty($mokashert)) {{ $mokashert[0]->program->program }} @endif --}}</a></li>
                            <li class="breadcrumb-item active">البرامج</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <button type="button" class="btn btn-primary waves-effect waves-light"
                                data-bs-toggle="modal" data-bs-target="#create-new-category">
                            <i class="bx bx-add-to-queue font-size-16 align-middle me-2"></i>أضافه مؤشر جديد
                        </button>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100 text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>المؤشر</th>
                            <th> نوع المؤشر</th>
                            <th>المضاف بواسطه</th>
                            <th>توجيه  المؤشر</th>
                            <th>عرض المؤشر </th>
                            <th>التحكم</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($mokashert  as $mokasher)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="text-align: right">{{ $mokasher->name }} </td>
                                <td style="text-align: right">{{ $mokasher->type }} </td>
                                <td>  @if( $mokasher->addedBy == 0 ) الأداره@else {{ $mokasher->addedBy_fun->geha }} @endif  </td>
                                <td><a  class="btn btn-success btn btn-sm" href="{{ route('gehat.mokaseerinput', $mokasher->id) }}"> توجيه المؤشر </a></td>
                                <td><a  class="btn btn-primary  btn btn-sm" href="{{ route('gehat.mokasherData', $mokasher->id) }}"> عرض المؤشر </a></td>

                                <td>
                                    @if($mokasher->addedBy == \Illuminate\Support\Facades\Auth::user()->id )
                                        <div class="btn-group">
                                            <a href="{{ route('dashboard.moksherat.edit', $mokasher->id) }}" class="text-muted font-size-20 edit"><i class="bx bxs-edit"></i></a>
                                            <form action="{{ route('dashboard.moksherat.destroy', $mokasher->id) }}"
                                                  method="POST">@csrf @method('delete')
                                                <a class="text-muted font-size-20 confirm-delete"><i
                                                        class="bx bx-trash"></i></a>
                                            </form>
                                        </div>
                                      @else
                                        <span class="badge badge-soft-danger">غير مصرح بالتعديل بالحذف </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">لا يوجد مؤشرات موجهه </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('gehat.moksherat.modals.store-modal')
    @include('gehat.moksherat.modals.edit-modal')
@endsection
@push('scripts')
    <script src="{{asset(PUBLIC_PATH.'/assets/admin/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset(PUBLIC_PATH.'/assets/admin/js/pages/sweet-alerts.init.js')}}"></script>
    <!-- Required datatable js -->
    <script src="{{asset(PUBLIC_PATH.'/assets/admin/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset(PUBLIC_PATH.'assets/admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{asset(PUBLIC_PATH.'/assets/admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset(PUBLIC_PATH.'/assets/admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- Datatable init js -->
    <script src="{{asset(PUBLIC_PATH.'/assets/admin/js/pages/datatables.init.js')}}"></script>

    @include('gehat.moksherat.scripts.store')
    @include('gehat.moksherat.scripts.delete')
    @include('gehat.moksherat.scripts.edit')
@endpush
