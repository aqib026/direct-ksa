@extends('layouts.front-end')
@section('content')
    @if (session()->has('success'))
        <div class="col-md-6 alert alert-success" role="alert">
            {!! session()->get('success') !!}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="col-md-6 alert alert-danger" role="alert">
            {!! session()->get('error') !!}
        </div>
    @endif
    <section class="section border-0 bg-quaternary m-0 p-0 border-1">

        <div class="steps w-100 text-center">
            <a class="col-lg-3 col-xs-3 step"><span class="badge rounded-pill bg-success p-2">{{ __('steps.s1') }}:
                    <strong>{{ __('steps.s1i') }}</strong>&nbsp;<i class="fa fa-check-circle"></i></span></a>
            <a class="col-lg-3 col-xs-3 step active"><span>{{ __('steps.s2') }}:
                    <strong>{{ __('steps.s2i') }}</strong></span></a>
            <a class="col-lg-3 col-xs-3 step"><span>{{ __('steps.s3') }}: <strong>{{ __('steps.s3i') }}</strong></span></a>
            <a class="col-lg-3 col-xs-3 step step-last"><span>{{ __('steps.s4') }}:
                    <strong>{{ __('steps.s4i') }}</strong></span></a>
        </div>
    </section>
    <section class="section border-0 bg-quaternary m-0">
        <form action="{{ route('visa_request_payment_form') }}" role="form" method="post" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col col-lg-9 text-center">
                        <div class="divider divider-small divider-small-lg mt-0 text-center appear-animation"
                            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
                            <hr class="bg-primary border-radius m-auto">
                        </div>
                        <div class="overflow-hidden mb-1">
                            <h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation"
                                data-appear-animation="maskUp" data-appear-animation-delay="100">{{ __('steps.vr') }}</h3>
                        </div>
                        <h2 class="text-color-dark font-weight-bold text-8 pb-4 mb-0 appear-animation"
                            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">{{ __('steps.ti') }}
                        </h2>
                    </div>
                </div>
                <div class="row py-5 appear-animation datepickercustom" data-appear-animation="fadeIn"
                    data-appear-animation-delay="300">
                    <div class="overflow-hidden mb-3 text-center ">
                        <h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="100">{{ __('steps.wte') }}</h2>
                    </div>
                    <div class="col col-lg-12 text-center py-3 datepickercustom" id="datepicker"></div>
                    <div class="col col-lg-12 text-center py-3 datepickercustom">
                        <div class="overflow-hidden mb-1">
                            <h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-1 text-5 line-height-2 line-height-sm-7 mb-3 appear-animation"
                                data-appear-animation="maskUp" data-appear-animation-delay="100">{{ __('steps.edt') }}</h3>
                            <h1 class="font-weight-semi-bold text-5 line-height-2 line-height-sm-7 mb-5 selecteddatediv">
                                @if (isset($form_data['travel_date']))
                                    {{ $form_data['travel_date'] }}
                                @else
                                    --
                                @endif
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 py-5 appear-animation datepickercustom" data-appear-animation="fadeIn"
                    data-appear-animation-delay="300">
                    <div class="overflow-hidden mb-1 text-center">
                        <h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="100">{{ __('steps.wwa') }}</h2>
                    </div>
                    <div class="overflow-hidden mb-5 text-center">
                        <h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-1 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="100"><i
                                class="fa fa-info-circle"></i>&nbsp;{{ $VisaRequest->country->name }} {{ __('steps.eqi') }}</h3>
                    </div>
                    <div class="col col-lg-12 text-center py-3">
                        <div class="row">
                            <div class="form-group col">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label form-check-label-custom {{session()->get('locale') == 'ar'?'label_rtl_style':''}}" >
                                        <input class="form-check-input form-check-input-custom {{session()->get('locale') == 'ar'?'radio_rtl_style ':''}} " type="radio"
                                            name="appointment_city" data-msg-required="Please select at least one option."
                                            value="Riyadh" @if (isset($form_data['appointment_city']) && $form_data['appointment_city'] == 'Riyadh') checked @endif
                                            required>{{ __('steps.r') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="form-group col">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label form-check-label-custom" style="margin-left: 28px">
                                        <input class="form-check-input form-check-input-custom" type="radio"
                                            name="appointment_city" data-msg-required="Please select at least one option."
                                            value="Dhahran" @if (isset($form_data['appointment_city']) && $form_data['appointment_city'] == 'Dhahran') checked @endif
                                            required>{{ __('steps.d') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="form-group col">
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label form-check-label-custom" style="margin-left: 14px">
                                        <input class="form-check-input form-check-input-custom {{session()->get('locale') == 'ar'?'radio_rtl_style ':''}}" type="radio"
                                            name="appointment_city" data-msg-required="Please select at least one option."
                                            value="Jeddah" @if (isset($form_data['appointment_city']) && $form_data['appointment_city'] == 'Jeddah') checked @endif
                                            required>{{ __('steps.j') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mt-5 py-5 appear-animation datepickercustom" data-appear-animation="fadeIn"
                    data-appear-animation-delay="300">
                    <div class="overflow-hidden mb-5 text-center">
                        <h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="100">{{ __('steps.cnt') }}</h2>
                    </div>
                    <div class="col col-lg-12 text-center py-3">
                        <table class="table table-bordered">
                            <tbody>
                                <tr class="{{ $VisaRequest->adult_price ?? 'd-none' }}">
                                    <td width="30%">
                                        <div class="mt-5">{{ __('steps.ad') }}</div>
                                    </td>
                                    <td width="40%">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <button class="btn btn-secondary" id="adult_counter_minus"><i
                                                    class="fa fa-minus"></i></button>
                                            <span class="adult_counter">
                                                @if (isset($form_data['adult_count']))
                                                    {{ $form_data['adult_count'] }}
                                                @else
                                                    0
                                                @endif
                                            </span>
                                            <button class="btn btn-secondary" id="adult_counter_plus"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td width="30%">
                                        <div class="mt-5"><span class="adult_counter_sum"><span
                                                    class="adult_price_total">
                                                    @if (isset($form_data['adult_counter_sum']))
                                                        {{ $form_data['adult_counter_sum'] }}
                                                    @else
                                                        0
                                                    @endif
                                                </span> {{ __('steps.s') }}</span></div>
                                    </td>
                                    @if ($errors->has('adult_count') || $errors->has('child_count') || $errors->has('passport_count') )
                                        <div class="alert alert-danger">
                                            {{ __('steps.count')}}
                                            </div>
                                    @endif
                                </tr>
                                <tr class="{{ $VisaRequest->child_price ?? 'd-none' }}">
                                    <td width="30%">
                                        <div class="mt-5">{{ __('steps.ch') }}</div>
                                    </td>
                                    <td width="40%">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <button class="btn btn-secondary" id="child_counter_minus"><i
                                                    class="fa fa-minus"></i></button>
                                            <span class="child_counter">
                                                @if (isset($form_data['child_count']))
                                                    {{ $form_data['child_count'] }}
                                                @else
                                                    0
                                                @endif
                                            </span>
                                            <button class="btn btn-secondary" id="child_counter_plus"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </td>
                                    <td width="30%">
                                        <div class="mt-5"> <span class="child_counter_sum"><span
                                                    class="child_price_total">
                                                    @if (isset($form_data['child_counter_sum']))
                                                        {{ $form_data['child_counter_sum'] }}
                                                    @else
                                                        0
                                                    @endif
                                                </span> {{ __('steps.s') }}</span></div>
                                    </td>
                                </tr>
                                @if ($VisaRequest->adult_price == 0 && $VisaRequest->passport_price > 0)
                                    <tr class="{{ $VisaRequest->passport_price ?? 'd-none' }}">
                                        <td width="30%">{{ __('steps.pas') }}</td>
                                        <td width="40%"><button class="btn btn-secondary"
                                                id="passport_counter_minus"><i class="fa fa-minus"></i></button><span
                                                class="passport_counter">
                                                @if (isset($form_data['passport_count']))
                                                    {{ $form_data['passport_count'] }}
                                                @else
                                                    0
                                                @endif
                                            </span><button class="btn btn-secondary" id="passport_counter_plus"><i
                                                    class="fa fa-plus"></i></button></td>
                                        <td width="30%"><span class="passport_counter_sum"><span
                                                    class="passport_price_total">
                                                    @if (isset($form_data['passport_counter_sum']))
                                                        {{ $form_data['passport_counter_sum'] }}
                                                    @else
                                                        0
                                                    @endif
                                                </span> {{ __('steps.s') }}</span></td>
                                    </tr>
                                @endif
                                <tr class="d-none">
                                    <td width="30%">{{ __('steps.hp') }}</td>
                                    <td width="40%"><input class="form-control text-3 h-auto py-2" value=""
                                            name="promo_code" placeholder="Type Promo Here" /></td>
                                    <td width="30%"><button class="btn btn-primary">{{ __('steps.ap') }}</button></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="overflow-hidden mt-5 mb-1">
                            <h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-1 text-5 line-height-2 line-height-sm-7 mb-3 appear-animation"
                                data-appear-animation="maskUp" data-appear-animation-delay="100">{{ __('steps.total') }}
                            </h3>
                            <h1 class="font-weight-semi-bold text-5 line-height-2 line-height-sm-7 mb-5 selectedpersons">
                                <span class="passenger_total">
                                    @if (isset($form_data['passenger_total']) && $form_data['passenger_total'] > 0)
                                        @php $temp_passenger_total = (float) $form_data['passenger_total']; @endphp
                                        {!! @number_format($temp_passenger_total) !!}
                                    @elseif(isset($form_data['passport_counter_sum']) && $form_data['passport_counter_sum'] > 0)
                                        @php $temp_passport_counter_sum = (float) $form_data['passport_counter_sum']; @endphp
                                        {!! @number_format($temp_passport_counter_sum) !!}
                                    @else
                                        0
                                    @endif
                                </span> {{ __('steps.s') }}</h1>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 py-5 appear-animation datepickercustom" data-appear-animation="fadeIn"
                    data-appear-animation-delay="300">
                    <div class="overflow-hidden mb-5 text-center">
                        <h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-0 appear-animation"
                            data-appear-animation="maskUp" data-appear-animation-delay="100">{{ __('steps.trt') }}</h2>
                    </div>
                    <div class="col col-lg-12 text-center px-5 py-3">
                        <div class="custom-select-1">
                            <select class="form-select form-control h-auto py-2"
                                data-msg-required="Please Select Relation" name="relation" required="required">
                                <option value="" disabled selected>{{ __('steps.psr') }}</option>
                                <option value="Family" @if (isset($form_data['relation']) && $form_data['relation'] == 'Family') selected @endif>
                                    {{ __('steps.fm') }}</option>
                                <option value="Friends" @if (isset($form_data['relation']) && $form_data['relation'] == 'Friends') selected @endif>
                                    {{ __('steps.fr') }}</option>
                                <option value="Others" @if (isset($form_data['relation']) && $form_data['relation'] == 'Others') selected @endif>
                                    {{ __('steps.ot') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="adult_price" name="adult_price"
                    value="{{ $VisaRequest->adult_price ?? '0' }}" />
                <input type="hidden" id="child_price" name="child_price"
                    value="{{ $VisaRequest->child_price ?? '0' }}" />
                <input type="hidden" id="passport_price" name="passport_price"
                    value="{{ $VisaRequest->passport_price ?? '0' }}" />

                <input type="hidden" id="adult_counter_sum" name="adult_counter_sum"
                    @if (isset($form_data['adult_counter_sum'])) value="{{ $form_data['adult_counter_sum'] }}" @else value="0" @endif />
                <input type="hidden" id="child_counter_sum" name="child_counter_sum"
                    @if (isset($form_data['child_counter_sum'])) value="{{ $form_data['child_counter_sum'] }}" @else value="0" @endif />
                <input type="hidden" id="passport_counter_sum" name="passport_counter_sum"
                    @if (isset($form_data['passport_counter_sum'])) value="{{ $form_data['passport_counter_sum'] }}" @else value="0" @endif />
                <input type="hidden" id="passenger_total" name="passenger_total"
                    @if (isset($form_data['passenger_total'])) value="{{ $form_data['passenger_total'] }}" @else value="0" @endif />

                <input type="hidden" id="country" name="country"
                    @if (isset($form_data['country'])) value="{{ $form_data['country'] }}" @endif />
                <input type="hidden" id="visa_type" name="visa_type"
                    @if (isset($form_data['visa_type'])) value="{{ $form_data['visa_type'] }}" @endif />

                <input type="hidden" id="adult_count" name="adult_count"
                    @if (isset($form_data['adult_count'])) value="{{ $form_data['adult_count'] }}" @else value="0" @endif />
                <input type="hidden" id="child_count" name="child_count"
                    @if (isset($form_data['child_count'])) value="{{ $form_data['child_count'] }}" @else value="0" @endif />
                <input type="hidden" id="passport_count" name="passport_count"
                    @if (isset($form_data['passport_count'])) value="{{ $form_data['passport_count'] }}" @else value="0" @endif />
                <input type="hidden" id="travel_date" name="travel_date"
                    @if (isset($form_data['travel_date'])) value="{{ $form_data['travel_date'] }}" @else value="" @endif />

                <div class="row py-5 appear-animation datepickercustom" data-appear-animation="fadeIn"
                    data-appear-animation-delay="300">
                    <div class="col col-lg-12 text-center">
                        <button class="btn btn-modern btn-primary btn-arrow-effect-1 btn-xl mb-2"
                            type="submit">{{ __('steps.ns3') }}</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('styles')
    <style>
        .form-check-label-custom {
            display: flex;
            align-items: center;
            cursor: pointer;
            /* Ensure cursor changes to pointer on hover */
        }

        .form-check-label-custom input[type="radio"] {
            margin-right: 5px;
            /* Adjust margin between radio button and text */
        }
        .radio_rtl_style{
            margin-left: 0.5em !important;
        }
        .label_rtl_style{
            margin-right: 31px !important;
        }
    </style>
@endsection
@section('custom-scripts')
    <script src="{{ asset('front-end/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
			// Function to format the number
            function formatNumber(number) {
                return new Intl.NumberFormat('en-US').format(number);
            }
            $('#adult_counter_minus').on('click', function() {
                var adult_counter_current_value = parseInt($('.adult_counter').text());
                var adult_price_total = 0;
                var adult_price = parseInt($('#adult_price').val());
                if (adult_counter_current_value > 0) {
                    adult_counter_current_value--;
                    adult_price_total = adult_counter_current_value * adult_price;
                } else {
                    adult_counter_current_value = 0;
                }
                $('.adult_counter').text(adult_counter_current_value);
                $('#adult_count').val(adult_counter_current_value);
                $('.adult_price_total').text(formatNumber(adult_price_total));
                $('#adult_counter_sum').val(adult_price_total);
                var child_price_total = parseInt($('.child_price_total').text());
                $('.passenger_total').text(formatNumber(adult_price_total + child_price_total));
                $('#passenger_total').val(adult_price_total + child_price_total);
                return false;

            });
            $('#adult_counter_plus').on('click', function() {
                var adult_counter_current_value = parseInt($('.adult_counter').text());
                var adult_price_total = 0;
                var adult_price = parseInt($('#adult_price').val());
                if (adult_counter_current_value >= 0) {
                    adult_counter_current_value++;
                    adult_price_total = adult_counter_current_value * adult_price;
                } else {
                    adult_counter_current_value = 0;
                }
                $('.adult_counter').text(formatNumber(adult_counter_current_value));
                $('#adult_count').val(adult_counter_current_value);
                $('.adult_price_total').text(formatNumber(adult_price_total));
                $('#adult_counter_sum').val(adult_price_total);
                var child_price_total = parseInt($('.child_price_total').text());
                $('.passenger_total').text(formatNumber(adult_price_total + child_price_total));
                $('#passenger_total').val(adult_price_total + child_price_total);
                return false;

            });
            $('#child_counter_minus').on('click', function() {
                var child_counter_current_value = parseInt($('.child_counter').text());
                var child_price_total = 0;
                var child_price = $('#child_price').val();
                if (child_counter_current_value > 0) {
                    child_counter_current_value--;
                    child_price_total = child_counter_current_value * child_price;
                } else {
                    child_counter_current_value = 0;
                }
                $('.child_counter').text(child_counter_current_value);
                $('#child_count').val(child_counter_current_value);
                $('.child_price_total').text(formatNumber(child_price_total));
                $('#child_counter_sum').val(child_price_total);
                var adult_price_total = parseInt($('.adult_price_total').text());
                $('.passenger_total').text(formatNumber(adult_price_total + child_price_total));
                $('#passenger_total').val(adult_price_total + child_price_total);
                return false;

            });

            $('#child_counter_plus').on('click', function() {
                var child_counter_current_value = parseInt($('.child_counter').text());
                var child_price_total = 0;
                var child_price = $('#child_price').val();
                if (child_counter_current_value >= 0) {
                    child_counter_current_value++;
                    child_price_total = child_counter_current_value * child_price;
                } else {
                    child_counter_current_value = 0;
                }
                $('.child_counter').text(child_counter_current_value);
                $('#child_count').val(child_counter_current_value);
                $('.child_price_total').text(formatNumber(child_price_total));
                $('#child_counter_sum').val(child_price_total);
                var adult_price_total = parseInt($('.adult_price_total').text());

                $('.passenger_total').text(formatNumber(adult_price_total + child_price_total));
                $('#passenger_total').val(adult_price_total + child_price_total);
                return false;

            });

            $('#passport_counter_minus').on('click', function() {
                var passport_counter_current_value = parseInt($('.passport_counter').text());
                var passport_price_total = 0;
                var passport_price = parseInt($('#passport_price').val());
                if (passport_counter_current_value > 0) {
                    passport_counter_current_value--;
                    passport_price_total = passport_counter_current_value * passport_price;
                } else {
                    passport_counter_current_value = 0;
                }
                $('.passport_counter').text(passport_counter_current_value);
                $('#passport_count').val(passport_counter_current_value);
                $('.passport_price_total').text(passport_price_total);
                $('#passport_counter_sum').val(passport_price_total);
                $('.passenger_total').text(passport_price_total);
                return false;

            });
            $('#passport_counter_plus').on('click', function() {
                var passport_counter_current_value = parseInt($('.passport_counter').text());
                var passport_price_total = 0;
                var passport_price = parseInt($('#passport_price').val());
                if (passport_counter_current_value >= 0) {
                    passport_counter_current_value++;
                    passport_price_total = passport_counter_current_value * passport_price;
                } else {
                    passport_counter_current_value = 0;
                }
                $('.passport_counter').text(passport_counter_current_value);
                $('#passport_count').val(passport_counter_current_value);
                $('.passport_price_total').text(passport_price_total);
                $('#passport_counter_sum').val(passport_price_total);
                $('.passenger_total').text(passport_price_total);
                return false;

            });
        });

        function join(t, a, s) {
            function format(m) {
                let f = new Intl.DateTimeFormat('en', m);
                return f.format(t);
            }
            return a.map(format).join(s);
        }

        $("#datepicker").datepicker({
            minDate: 0, // Sets the minimum selectable date to today
            beforeShowDay: function(date) {
                var today = new Date(); // Current date
                var yesterday = new Date(today); // Create a new date object
                yesterday.setDate(today.getDate() - 1); // Subtract one day
                if (date < yesterday)
                    return false;
                else
                    return true;
            }
        }).on("changeDate", function(e) {
            let a = [{day: 'numeric'}, {month: 'numeric'}, {year: '2-digit'}];
            let s = join(e.date, a, '-');

            $(".selecteddatediv").html(s);
            $("#travel_date").val(s);
        });
    </script>
@endsection
