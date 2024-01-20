@extends('gehat.layouts.app')
@push('title','أضافه مدخلات المؤشر ')
@push('styles')
    <link href="{{asset(PUBLIC_PATH.'/assets/admin/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush
@section('content')
    @php
        $selected  = config('app.selected_year') ;
        $selected_year_value = 0  ;
        if(!empty($mokasher->mokasher_inputs) && count($mokasher->mokasher_inputs))
         {
              $selected_year_value =  $mokasher->mokasher_inputs[0]->{"year_" . $selected};
          }
    @endphp
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body" style="text-align: right">
                    <h4 class="card-title mb-5"> أضافه مدخلات  المؤشر </h4>
                    <form id="store-mokasher-input" class="repeater" action="{{route('dashboard.moksherat.store_mokaseerinput')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label>المستهدف فى سنه {{ config('app.selected_year') }}</label>
                                <input type="text" readonly value="{{$selected_year_value}}" class="form-control" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label>المنجز</label>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="number" name="part_1" class="form-control" placeholder="الربع الاول " min="0">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" name="part_2" class="form-control" placeholder="الربع الثانى "  min="0">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" name="part_3" class="form-control" placeholder="الربع الثالث "  min="0">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" name="part_4" class="form-control" placeholder="الربع الرابع " min="0" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <p class="form-label mb-2">أوافق / لا أوافق </p>
                                    <input type="checkbox" value="1" name="accept" id="accept" switch="none"/>
                                    <label for="accept" data-on-label="نعم" data-off-label="لا"></label>
                                </div>
                            </div>
                        </div>
                        <textarea class="form-control" rows="5" id="reason" name="reson"></textarea>

                        <div class="mb-2 text-center">
                            <div class="spinner-border text-primary m-1 d-none" role="status"><span class="sr-only"></span></div>
                        </div>
                        <div>
                            <button type="submit" id="submit-button" class="btn btn-primary w-md btn-lg">حفظ المدخلات  </button>
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
