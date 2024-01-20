@extends('gehat.layouts.app')
@push('title','أضافه مدخلات المؤشر ')
@push('styles')
    <link href="{{asset(PUBLIC_PATH.'/assets/admin/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body" style="text-align: right">
                    <h4 class="card-title mb-5"> توجيه المؤشر </h4>
                     <form id="store-mokasher-input" class="repeater" action="{{route('gehat.redirect_mokasher' ,  $mokasher_id )}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                @if(!empty($selected_year))
                                    <label>المستهدف فى سنه {{ $selected_year->year_name }}</label>
                                    <input type="text" readonly value="{{$selected_year_value->value}}" class="form-control" >
                                    <input  type="hidden" name="target" value="{{$selected_year_value->value}}">
                                    <input type="hidden" name="year_id" value="{{ $selected_year_value->year_id }}">
                                @else
                                    <span class="text-danger">* لم يتم  تحديد السنه  المستهدفه </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input type="hidden" name="mokasher_id" value="{{$mokasher_id}}">
                                    <div class="mb-3">
                                        <label class="form-label">الجهه المختصه</label>
                                        <select class=" form-control" name="sub_geha_id" data-placeholder="أختر الجهه المختصه" style="text-align: right" required>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}"
                                                 @if(!empty($mokasher->mokasher_geha_inputs))
                                                     @if($mokasher->mokasher_geha_inputs->geha_id == $user->id ) selected @endif
                                                 @endif
                                                > {{$user->geha}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                        </div>
                        <div class="row mb-2">

                        </div>
                         <label class="text-primary">المنجز  خلال الفتره</label>
                         @if(!empty($mokasher->mokasher_geha_inputs))
                         <div class="row mb-3">
                             <div class="col-md-2">
                                 <input type="text" name="part_1" class="form-control" value="{{$mokasher->mokasher_geha_inputs->part_1}}" placeholder="الربع الأول">
                             </div>
                             <div class="col-md-2">
                                 <input type="text" name="part_2" class="form-control" value="{{$mokasher->mokasher_geha_inputs->part_2}}" placeholder="الربع الأول">
                             </div>
                             <div class="col-md-2">
                                 <input type="text" name="part_3" class="form-control" value="{{$mokasher->mokasher_geha_inputs->part_3}}" placeholder="الربع الأول">
                             </div>
                             <div class="col-md-2">
                                 <input type="text" name="part_4" class="form-control" value="{{$mokasher->mokasher_geha_inputs->part_4}}" placeholder="الربع الأول">
                             </div>
                         </div>
                         @else
                             <div class="row mb-3">
                                 <div class="col-md-2">
                                     <input type="text" name="part_1" class="form-control" placeholder="الربع الأول">
                                 </div>
                                 <div class="col-md-2">
                                     <input type="text" name="part_2" class="form-control"  placeholder="الربع الأول">
                                 </div>
                                 <div class="col-md-2">
                                     <input type="text" name="part_3" class="form-control" placeholder="الربع الأول">
                                 </div>
                                 <div class="col-md-2">
                                     <input type="text" name="part_4" class="form-control" placeholder="الربع الأول">
                                 </div>
                             </div>
                         @endif

                         <div class="mb-2 text-center">
                             <div class="spinner-border text-primary m-1 d-none" role="status"><span class="sr-only"></span></div>
                         </div>
                          <div>
                              <button type="submit" id="submit-button" class="btn btn-primary w-md btn-lg">توجيه</button>
                           </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{asset(PUBLIC_PATH.'/assets/admin/libs/select2/js/select2.min.js')}}"></script>
    <script src="{{asset(PUBLIC_PATH.'/assets/admin/js/pages/form-advanced.init.js')}}"></script>
    <script src="{{asset(PUBLIC_PATH.'/assets/admin/libs/jquery.repeater/jquery.repeater.min.js')}}"></script>
    <script src="{{asset(PUBLIC_PATH.'/assets/admin/js/pages/form-repeater.int.js')}}"></script>
    <script>
        // jQuery script for automatic calculation
        $(document).ready(function () {
            // Select all input fields for the years
            var yearFields = $('[name^="year_"]');

            // Bind an input event to each year field
            yearFields.on('input', function () {
                calculateTotal();
            });

            // Function to calculate and update the total field
            function calculateTotal() {
                var total = 0;

                // Sum the values of all year fields
                yearFields.each(function () {
                    var value = parseInt($(this).val()) || 0;
                    total += value;
                });

                // Update the total field with the calculated sum
                $('#target').val(total);
            }
        });
    </script>
    @include('admins.courses.scripts.detect-input-change')
    @include('admins.courses.scripts.store')
@endpush
