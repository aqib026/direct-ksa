@extends('layouts.front-end')

@section('content')

<section class="section border-0 m-0 bg-color-quaternary">
	<div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="divider divider-small divider-small-lg mt-0 text-center appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="0">
                    <hr class="bg-primary border-radius m-auto">
                </div>
                <div class="overflow-hidden mb-1">
                    <h3 class="font-weight-semi-bold text-color-grey text-uppercase positive-ls-3 text-4 line-height-2 line-height-sm-7 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">{{__('home.ss')}}</h3>
                </div>
                <h2 class="text-color-dark font-weight-bold text-8 pb-2 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">{{__('fetsales.ffa')}}</h2>
            </div>
        </div>
        <div class="align-items-center d-flex justify-content-center text-dark m-1 pb-5 py-4 row">
            <div class="p-75 bg-white shadow rounded col-lg-8" style="padding: 50px 20px;">
                <form action="{{ route('featured_sales_post') }}" role="form" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="required_service">{{__('fetsales.rs')}}</label>
                        <select class="form-control" name="required_service" id="required_service" required>
                            <option disabled selected></option>    
                            <option value="translation" @if($service == 'translation') selected @endif>{{__('fetsales.tr')}}</option>
                            <option value="passport_renewals" @if($service == 'passport_renewals') selected @endif>{{__('fetsales.pr')}}</option>
                            <option value="intl_dl_card" @if($service == 'intl_dl_card') selected @endif>{{__('fetsales.idlc')}}</option>
                            <option value="intl_dl_booklet" @if($service == 'intl_dl_booklet') selected @endif>{{__('fetsales.idlb')}}</option>
                            <option value="uni_adm" @if($service == 'uni_adm') selected @endif>{{__('fetsales.us')}}</option>
                            <option value="uae_visa" @if($service == 'uae_visa') selected @endif>{{__('fetsales.ukr')}}</option>
                            <option value="forms_filling" @if($service == 'forms_filling') selected @endif>{{__('fetsales.ff')}}</option>
                            <option value="bahrain_visa" @if($service == 'bahrain_visa') selected @endif>{{__('fetsales.bv')}}</option>
                            <option value="vip" @if($service == 'vip') selected @endif>{{__('fetsales.ps')}}</option>
                        </select>
                        @if ($errors->has('required_service'))
                            <span class="text-danger">{{ $errors->first('required_service') }}</span>
                        @endif
                    </div>

                    <div class="d-none translation">
                        <div class="form-group">
                            <label for="paper_quantity">{{__('fetsales.pq')}}</label>
                            <select class="form-control" name="paper_quantity" id="paper_quantity">
                                @for ($i = 0; $i <= 19; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="documents">{{__('fetsales.upd')}}</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="documents[]" accept=".jpeg, .jpg, .png, .pdf" multiple="multiple" class="custom-file-input" id="documents" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label" for="documents">{{__('fetsales.cf')}}</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="translation_content">{{__('fetsales.tc')}}</label>
                            <select class="form-control" name="translation_content" id="translation_content">
                                <option disabled selected></option>    
                                <option value="Job Letter">{{__('fetsales.jb')}}</option>
                                <option value="Medical Report">{{{__('fetsales.mr')}}}</option>
                                <option value="Legal Documents">{{__('fetsales.ld')}}</option>
                                <option value="University Research">{{__('fetsales.ur')}}</option>
                                <option value="Official Documents">{{__('fetsales.ofd')}}</option>
                                <option value="Others">{{__('fetsales.ot')}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-none intl_dl_card">
                        <div class="form-group">
                            <label for="idl_card_qty">{{__('fetsales.idlcq')}}</label>
                            <select class="form-control" name="idl_card_qty" id="idl_card_qty">
                                @for ($i = 0; $i <= 19; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="d-none intl_dl_booklet">
                        <div class="form-group">
                            <label for="idl_qty">{{__('fetsales.idlq')}}</label>
                            <select class="form-control" name="idl_qty" id="idl_qty">
                                @for ($i = 0; $i <= 19; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="d-none intl_dl_card intl_dl_booklet">
                        <div class="form-group">
                            <label for="lic_col_choice">{{__('fetsales.lcc')}}</label>
                            <select class="form-control" name="lic_col_choice" id="lic_col_choice">
                                <option disabled selected></option>    
                                <option value="Riyadh (As Safarat) Branch">{{__('fetsales.rsb')}}</option>
                                <option value="Riyadh (Umm Ul Hamam) Branch">{{__('fetsales.rhb')}}</option>
                                <option value="Jaddah Branch">{{__('fetsales.jdb')}}</option>
                                <option value="Buraydah Branch">{{__('fetsales.bb')}}</option>
                                <option value="AlKhobar Branch">{{__('fetsales.ab')}}</option>
                                <option value="By Courier (with Additional Charges)">{{__('fetsales.bca')}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-none uni_adm">
                        <div class="form-group">
                            <label for="univ_adm_country">{{__('fetsales.cty')}}</label>
                            <select class="form-control" name="univ_adm_country" id="univ_adm_country">
                                <option disabled selected></option>    
                                <option value="United Kindom">{{__('fetsales.uk')}}</option>
                                <option value="USA">{{__('fetsales.usa')}}</option>
                                <option value="Canada">{{__('fetsales.cnd')}}</option>
                                <option value="Australia">{{__('fetsales.ast')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nationality">{{__('fetsales.nty')}}</label>
                            <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nationality">
                        </div>
                        <div class="form-group">
                            <label for="mode_of_finance">{{__('fetsales.mof')}}</label>
                            <select class="form-control" name="mode_of_finance" id="mode_of_finance">
                                <option disabled selected></option>    
                                <option value="Govt, Employer Scholarship">{{__('fetsales.ges')}}</option>
                                <option value="Self-Finance">{{__('fetsales.sf')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="major_of_study">{{__('fetsales.mos')}}</label>
                            <input type="text" class="form-control" name="major_of_study" id="major_of_study" placeholder="Major of Study (2 majors maximum)">
                        </div>
                        <div class="form-group">
                            <label for="current_qualification">{{__('fetsales.cq')}}</label>
                            <select class="form-control" name="current_qualification" id="current_qualification">
                                <option disabled selected></option>    
                                <option value="High School">{{__('fetsales.hs')}}</option>
                                <option value="Bachelors">{{__('fetsales.bch')}}</option>
                                <option value="Masters">{{__('fetsales.ms')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="last_qualification_grade">{{__('fetsales.lqg')}}</label>
                            <select class="form-control" name="last_qualification_grade" id="last_qualification_grade">
                                <option disabled selected></option>    
                                <option value="Weak">{{__('fetsales.weak')}}</option>
                                <option value="Fair/Acceptable">{{__('fetsales.fair')}}</option>
                                <option value="Good">{{__('fetsales.good')}}</option>
                                <option value="Very Good">{{__('fetsales.vg')}}</option>
                                <option value="Excellent">{{__('fetsales.exc')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="certification">{{__('fetsales.dhielts')}}</label>
                            <select class="form-control" name="certification" id="certification">
                                <option disabled selected></option>    
                                <option value="I Don't Have Certification">{{__('fetsales.idhc')}}</option>
                                <option value="IELTS">{{__('fetsales.iet')}}</option>
                                <option value="TOEFL">{{__('fetsales.toefl')}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="call_time">{{__('fetsales.stbt')}}</label>
                            <select class="form-control" name="call_time" id="call_time">
                                <option disabled selected></option>    
                                <option value="10:00 AM to 02:00 PM">{{__('fetsales.am')}}</option>
                                <option value="03:00 PM to 06:00 PM">{{__('fetsales.pm')}}</option>
                                <option value="06:00 PM to 09:00 PM">{{__('fetsales.ap')}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-none forms_filling">
                        <div class="form-group">
                            <label for="form_type">{{__('fetsales.ft')}}</label>
                            <select class="form-control" name="form_type" id="form_type">
                                <option disabled selected></option>    
                                <option value="Singapore Entry Form">{{__('fetsales.sef')}}</option>
                                <option value="Embassy Application">{{__('fetsales.ea')}}</option>
                                <option value="Hotel Reservation">{{__('fetsales.hr')}}</option>
                                <option value="Airline Reservation">{{__('fetsales.air')}}</option>
                                <option value="Airline + Hotel Reservation">{{__('fetsales.aiho')}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-none passport_renewals uae_visa bahrain_visa vip">
                        <div class="form-group">
                            <label for="passport_quantity">{{__('fetsales.pasq')}}</label>
                            <select class="form-control" name="passport_quantity" id="passport_quantity">
                                @for ($i = 0; $i <= 19; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="d-none passport_renewals">
                        <div class="form-group">
                            <label for="country">{{__('fetsales.cty')}}</label>
                            <select class="form-control" name="country" id="country">
                                <option disabled selected>{{__('fetsales.scfw')}}</option>    
                                <option value="India">{{__('fetsales.in')}}</option>
                                <option value="Indonesia">{{__('fetsales.ind')}}</option>
                                <option value="Philippines">{{__('fetsales.phi')}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="applicant_name">{{__('fetsales.apn')}}</label>
                        <input type="text" class="form-control" name="applicant_name" id="applicant_name" value="{{ old('applicant_name', isset($user) ? $user->name : '') }}" placeholder="e.g. Ahmed, Abdullah" required>
                        @if ($errors->has('applicant_name'))
                            <span class="text-danger">{{ $errors->first('applicant_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="mobile_number">{{__('fetsales.num')}}</label>
                        <div class="input-group mb-3">
                            
                            <input type="text" name="mobile_number" id="mobile_number" class="form-control" aria-label="5xxxxxxxxx" value="{{ old('mobile_number', isset($user) ? $user->number : '') }}" placeholder="5xxxxxxxxx" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smartphone"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg></span>
                            </div>
                        </div>
                        @if ($errors->has('mobile_number'))
                            <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">{{__('fetsales.email')}}</label>
                        <div class="input-group mb-3">
                            <input type="text" name="email" id="email" class="form-control" aria-label="Email e.g. abc@xyz.com" value="{{ old('email', isset($user) ? $user->email : '') }}" placeholder="Email e.g. abc@xyz.com" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></span>
                            </div>
                        </div>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <fieldset class="form-group text-center">
                        <div>
                            <label class="font-weight-bold"> {{__('fetsales.sc')}} </label>
                            <div class="text-primary">
                                <span class="font-weight-bold service_cost_text_amount">--</span> 
                                <p class="text-primary service_cost_text_desc"></p>
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="service_cost" id="service_cost" value=""/>
                    <div class="b-overlay-wrap position-relative d-flex flex-column">
                        <button type="submit" class="btn w-100 btn-primary">{{__('fetsales.subn')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('custom-scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#required_service').trigger("change");
    });
    $('#required_service').change(function () {
        $('.d-block-custom').addClass('d-none');
        $("div").removeClass("d-block-custom");
        $('.' + $('#required_service').val()).addClass('d-block-custom').removeClass('d-none');

        var required_service = $('#required_service').val();
        switch (required_service) { 
            case 'translation': 
                $('.service_cost_text_amount').text('');
                $('.service_cost_text_desc').text(@json(__('fetsales.jcdr')));
                $('#service_cost').val('');
                break;
            case 'passport_renewals': 
                var total = passport_calculation($('#passport_quantity').val(), 119);
                $('.service_cost_text_amount').text(total + @json(__('fetsales.sar')));
                $('#service_cost').val(total);
                $('.service_cost_text_desc').text(@json(__('fetsales.coin')));
                break;
            case 'intl_dl_card': 
                var total = passport_calculation($('#idl_card_qty').val(), 239);
                $('.service_cost_text_amount').text(total + @json(__('fetsales.sar')));
                $('#service_cost').val(total);
                $('.service_cost_text_desc').text(@json(__('fetsales.coidl')));
                break;      
            case 'intl_dl_booklet': 
                var total = passport_calculation($('#idl_qty').val(), 119);
                $('.service_cost_text_amount').text(total + @json(__('fetsales.sar')));
                $('#service_cost').val(total);
                $('.service_cost_text_desc').text(@json(__('fetsales.coidl')));
                break;
            case 'uni_adm': 
                $('.service_cost_text_amount').text('');
                $('.service_cost_text_desc').text(@json(__('fetsales.cwd')));
                $('#service_cost').val('');
                break;
            case 'uae_visa': 
                var total = passport_calculation($('#passport_quantity').val(), 499);
                $('.service_cost_text_amount').text(total + @json(__('fetsales.sar')));
                $('#service_cost').val(total);
                $('.service_cost_text_desc').text(@json(__('fetsales.pivf')));
                break;
            case 'forms_filling': 
                $('.service_cost_text_amount').text('');
                $('.service_cost_text_desc').text(@json(__('fetsales.cwsg')));
                $('#service_cost').val('');
                break;  
            case 'bahrain_visa': 
                var total = passport_calculation($('#passport_quantity').val(), 259);
                $('.service_cost_text_amount').text(total + @json(__('fetsales.sar')));
                $('#service_cost').val(total);
                $('.service_cost_text_desc').text('');
                break;  
            case 'vip': 
                var total = passport_calculation($('#passport_quantity').val(), 390);
                $('.service_cost_text_amount').text(total + @json(__('fetsales.sar')));
                $('#service_cost').val(total);
                $('.service_cost_text_desc').text('');
                break;
            default:
                $('.service_cost_text_amount').text('--');
                $('.service_cost_text_desc').text('');
                $('#service_cost').val('');
        }

    });
    $('#passport_quantity').change(function () {
        var required_service = $('#required_service').val();
        var amount = 0;
        switch (required_service) { 
            case 'passport_renewals': 
                amount = 119;
                break;
            case 'uae_visa': 
                amount = 499;
                break;
            case 'bahrain_visa': 
                amount = 259;
                break;      
            case 'vip': 
                amount = 390;
                break;
            default:
                amount = 0;
        }

        var total = passport_calculation($('#passport_quantity').val(), amount);
        $('.service_cost_text_amount').text(total + @json(__('fetsales.sar')));
        $('#service_cost').val(total);
    });
    $('#idl_card_qty').change(function () {
        var total = passport_calculation($('#idl_card_qty').val(), 239);
        $('.service_cost_text_amount').text(total + @json(__('fetsales.sar')));
        $('#service_cost').val(total);
    });
    $('#idl_qty').change(function () {
        var total = passport_calculation($('#idl_qty').val(), 119);
        $('.service_cost_text_amount').text(total + @json(__('fetsales.sar')));
        $('#service_cost').val(total);
    });
    function passport_calculation(passport_qty = 0, amount){
        return passport_qty*amount;
    }
</script>

@endsection