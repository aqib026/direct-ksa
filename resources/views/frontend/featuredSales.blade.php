@extends('layouts.front-end')

@section('content')

<section class="section border-0 m-0 bg-color-quaternary">
	<div class="container">
        <div class="align-items-center d-flex justify-content-center m-1 pb-5 py-4 row">
            <div class="p-75 bg-white shadow rounded col-lg-8" style="padding: 50px 20px;">
                <form action="{{ route('featured_sales_post') }}" role="form" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="required_service">Required Service</label>
                        <select class="form-control" name="required_service" id="required_service" required>
                            <option disabled selected></option>    
                            <option value="translation" @if($service == 'translation') selected @endif>Translation</option>
                            <option value="passport_renewals" @if($service == 'passport_renewals') selected @endif>Passport Renewals</option>
                            <option value="intl_dl_card" @if($service == 'intl_dl_card') selected @endif>Intl Driving License - Card</option>
                            <option value="intl_dl_booklet" @if($service == 'intl_dl_booklet') selected @endif>Intl Driving License - Booklet</option>
                            <option value="uni_adm" @if($service == 'uni_adm') selected @endif>University Admissions</option>
                            <option value="uae_visa" @if($service == 'uae_visa') selected @endif>UAE Visa for KSA Residents</option>
                            <option value="forms_filling" @if($service == 'forms_filling') selected @endif>Forms Filling</option>
                            <option value="bahrain_visa" @if($service == 'bahrain_visa') selected @endif>Bahrain Visa for KSA Residents</option>
                            <option value="vip" @if($service == 'vip') selected @endif>Premium Service (VIP)</option>
                        </select>
                        @if ($errors->has('required_service'))
                            <span class="text-danger">{{ $errors->first('required_service') }}</span>
                        @endif
                    </div>

                    <div class="d-none translation">
                        <div class="form-group">
                            <label for="paper_quantity">Paper Quantity</label>
                            <select class="form-control" name="paper_quantity" id="paper_quantity">
                                @for ($i = 0; $i <= 19; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="documents">Upload Document for Translation (optional)</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="documents[]" accept=".jpeg, .jpg, .png, .pdf" multiple="multiple" class="custom-file-input" id="documents" aria-describedby="inputGroupFileAddon04">
                                    <label class="custom-file-label" for="documents">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="translation_content">Translation Content</label>
                            <select class="form-control" name="translation_content" id="translation_content">
                                <option disabled selected></option>    
                                <option value="Job Letter">Job Letter</option>
                                <option value="Medical Report">Medical Report</option>
                                <option value="Legal Documents">Legal Documents</option>
                                <option value="University Research">University Research</option>
                                <option value="Official Documents">Official Documents</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-none intl_dl_card">
                        <div class="form-group">
                            <label for="idl_card_qty">IDL Card Quantity</label>
                            <select class="form-control" name="idl_card_qty" id="idl_card_qty">
                                @for ($i = 0; $i <= 19; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="d-none intl_dl_booklet">
                        <div class="form-group">
                            <label for="idl_qty">IDL Quantity</label>
                            <select class="form-control" name="idl_qty" id="idl_qty">
                                @for ($i = 0; $i <= 19; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="d-none intl_dl_card intl_dl_booklet">
                        <div class="form-group">
                            <label for="lic_col_choice">License Collection Choice</label>
                            <select class="form-control" name="lic_col_choice" id="lic_col_choice">
                                <option disabled selected></option>    
                                <option value="Riyadh (As Safarat) Branch">Riyadh (As Safarat) Branch</option>
                                <option value="Riyadh (Umm Ul Hamam) Branch">Riyadh (Umm Ul Hamam) Branch</option>
                                <option value="Jaddah Branch">Jaddah Branch</option>
                                <option value="Buraydah Branch">Buraydah Branch</option>
                                <option value="AlKhobar Branch">AlKhobar Branch</option>
                                <option value="By Courier (with Additional Charges)">By Courier (with Additional Charges)</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-none uni_adm">
                        <div class="form-group">
                            <label for="univ_adm_country">Country</label>
                            <select class="form-control" name="univ_adm_country" id="univ_adm_country">
                                <option disabled selected></option>    
                                <option value="United Kindom">United Kindom</option>
                                <option value="USA">USA</option>
                                <option value="Canada">Canada</option>
                                <option value="Australia">Australia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nationality">Nationality</label>
                            <input type="text" class="form-control" name="nationality" id="nationality" placeholder="Nationality">
                        </div>
                        <div class="form-group">
                            <label for="mode_of_finance">Mode of Finance</label>
                            <select class="form-control" name="mode_of_finance" id="mode_of_finance">
                                <option disabled selected></option>    
                                <option value="Govt, Employer Scholarship">Govt, Employer Scholarship</option>
                                <option value="Self-Finance">Self-Finance</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="major_of_study">Major of Study (2 majors maximum)</label>
                            <input type="text" class="form-control" name="major_of_study" id="major_of_study" placeholder="Major of Study (2 majors maximum)">
                        </div>
                        <div class="form-group">
                            <label for="current_qualification">Current Qualification</label>
                            <select class="form-control" name="current_qualification" id="current_qualification">
                                <option disabled selected></option>    
                                <option value="High School">High School</option>
                                <option value="Bachelors">Bachelors</option>
                                <option value="Masters">Masters</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="last_qualification_grade">Last Qualification Grade</label>
                            <select class="form-control" name="last_qualification_grade" id="last_qualification_grade">
                                <option disabled selected></option>    
                                <option value="Weak">Weak</option>
                                <option value="Fair/Acceptable">Fair/Acceptable</option>
                                <option value="Good">Good</option>
                                <option value="Very Good">Very Good</option>
                                <option value="Excellent">Excellent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="certification">Do you have IELTS or TOEFL Certification?</label>
                            <select class="form-control" name="certification" id="certification">
                                <option disabled selected></option>    
                                <option value="I Don't Have Certification">I Don't Have Certification</option>
                                <option value="IELTS">IELTS</option>
                                <option value="TOEFL">TOEFL</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="call_time">Select the Best time to call you</label>
                            <select class="form-control" name="call_time" id="call_time">
                                <option disabled selected></option>    
                                <option value="10:00 AM to 02:00 PM">10:00 AM to 02:00 PM</option>
                                <option value="03:00 PM to 06:00 PM">03:00 PM to 06:00 PM</option>
                                <option value="06:00 PM to 09:00 PM">06:00 PM to 09:00 PM</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-none forms_filling">
                        <div class="form-group">
                            <label for="form_type">Form Type</label>
                            <select class="form-control" name="form_type" id="form_type">
                                <option disabled selected></option>    
                                <option value="Singapore Entry Form">Singapore Entry Form</option>
                                <option value="Embassy Application">Embassy Application</option>
                                <option value="Hotel Reservation">Hotel Reservation</option>
                                <option value="Airline Reservation">Airline Reservation</option>
                                <option value="Airline + Hotel Reservation">Airline + Hotel Reservation</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-none passport_renewals uae_visa bahrain_visa vip">
                        <div class="form-group">
                            <label for="passport_quantity">Passport Quantity</label>
                            <select class="form-control" name="passport_quantity" id="passport_quantity">
                                @for ($i = 0; $i <= 19; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="d-none passport_renewals">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <select class="form-control" name="country" id="country">
                                <option disabled selected>Select country for worker</option>    
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Philippines">Philippines</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="applicant_name">Applicant Name</label>
                        <input type="text" class="form-control" name="applicant_name" id="applicant_name" placeholder="e.g. Ahmed, Abdullah" required>
                        @if ($errors->has('applicant_name'))
                            <span class="text-danger">{{ $errors->first('applicant_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="mobile_number">Mobile Number</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+966</span>
                            </div>
                            <input type="text" name="mobile_number" id="mobile_number" class="form-control" aria-label="5xxxxxxxxx" placeholder="5xxxxxxxxx" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smartphone"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg></span>
                            </div>
                        </div>
                        @if ($errors->has('mobile_number'))
                            <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group mb-3">
                            <input type="text" name="email" id="email" class="form-control" aria-label="Email e.g. abc@xyz.com" placeholder="Email e.g. abc@xyz.com" required>
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
                            <label class="font-weight-bold"> Service Cost </label>
                            <div class="text-primary">
                                <span class="font-weight-bold service_cost_text_amount">--</span> 
                                <p class="text-primary service_cost_text_desc"></p>
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden" name="service_cost" id="service_cost" value=""/>
                    <div class="b-overlay-wrap position-relative d-flex flex-column">
                        <button type="submit" class="btn w-100 btn-primary">Submit Now !</button>
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
                $('.service_cost_text_desc').text('Cost will be determined after reviewing the documents.');
                $('#service_cost').val('');
                break;
            case 'passport_renewals': 
                var total = passport_calculation($('#passport_quantity').val(), 119);
                $('.service_cost_text_amount').text(total + ' SAR');
                $('#service_cost').val(total);
                $('.service_cost_text_desc').text('Cost Includes: Service fees, Appointment Booking & Form Filling, DOES NOT include Embassy Fees. (Passport renewal usually takes 15 to 35 days in Embassy)');
                break;
            case 'intl_dl_card': 
                var total = passport_calculation($('#idl_card_qty').val(), 239);
                $('.service_cost_text_amount').text(total + ' SAR');
                $('#service_cost').val(total);
                $('.service_cost_text_desc').text('Cost Includes: Service fees, IDL License, Collection from one of our branches. Cost DOES NOT include courier delivery.');
                break;		
            case 'intl_dl_booklet': 
                var total = passport_calculation($('#idl_qty').val(), 119);
                $('.service_cost_text_amount').text(total + ' SAR');
                $('#service_cost').val(total);
                $('.service_cost_text_desc').text('Cost Includes: Service fees, IDL License, Collection from one of our branches. Cost DOES NOT include courier delivery.');
                break;
            case 'uni_adm': 
                $('.service_cost_text_amount').text('');
                $('.service_cost_text_desc').text('Cost will decided one of our educational consultants contact you.');
                $('#service_cost').val('');
                break;
            case 'uae_visa': 
                var total = passport_calculation($('#passport_quantity').val(), 499);
                $('.service_cost_text_amount').text(total + ' SAR');
                $('#service_cost').val(total);
                $('.service_cost_text_desc').text('Price Includes: Visa Fees');
                break;
            case 'forms_filling': 
                $('.service_cost_text_amount').text('');
                $('.service_cost_text_desc').text('Cost will decided after one of our support agents contact you.');
                $('#service_cost').val('');
                break;  
            case 'bahrain_visa': 
                var total = passport_calculation($('#passport_quantity').val(), 259);
                $('.service_cost_text_amount').text(total + ' SAR');
                $('#service_cost').val(total);
                $('.service_cost_text_desc').text('');
                break;  
            case 'vip': 
                var total = passport_calculation($('#passport_quantity').val(), 390);
                $('.service_cost_text_amount').text(total + ' SAR');
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
        $('.service_cost_text_amount').text(total + ' SAR');
        $('#service_cost').val(total);
    });
    $('#idl_card_qty').change(function () {
        var total = passport_calculation($('#idl_card_qty').val(), 239);
        $('.service_cost_text_amount').text(total + ' SAR');
        $('#service_cost').val(total);
    });
    $('#idl_qty').change(function () {
        var total = passport_calculation($('#idl_qty').val(), 119);
        $('.service_cost_text_amount').text(total + ' SAR');
        $('#service_cost').val(total);
    });
    function passport_calculation(passport_qty = 0, amount){
        return passport_qty*amount;
    }
</script>
@endsection