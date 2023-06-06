@extends('layouts.app')

@section('content')
<div class="align-items-center d-flex justify-content-center m-1 pb-5 py-4 row">
    <div class="p-75 bg-white shadow rounded col-lg-8">
        <div class="form-group">
            <label for="required_service">Required Service</label>
            <select class="form-control" name="required_service" id="required_service">
                <option value="translation">Translation</option>
                <option value="passport_renewals">Passport Renewals</option>
                <option value="intl_dl_card">Intl Driving License - Card</option>
                <option value="intl_dl_booklet">Intl Driving License - Booklet</option>
                <option value="uni_adm">University Admissions</option>
                <option value="uae_visa">UAE Visa for KSA Residents</option>
                <option value="bahrain_visa">Bahrain Visa for KSA Residents</option>
            </select>
        </div>
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
                    <input type="file" name="documents" accept=".jpeg, .jpg, .png, .pdf" multiple="multiple" class="custom-file-input" id="documents" aria-describedby="inputGroupFileAddon04">
                    <label class="custom-file-label" for="documents">Choose file</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="translation_content">Translation Content</label>
            <select class="form-control" name="translation_content" id="translation_content">
                <option disabled selected></option>    
                <option value="job_letter">Job Letter</option>
                <option value="medical_report">Medical Report</option>
                <option value="legal_documents">Legal Documents</option>
                <option value="university_research">University Research</option>
                <option value="official_documents">Official Documents</option>
                <option value="others">Others</option>
            </select>
        </div>
        <div class="form-group">
            <label for="idl_card_qty">IDL Card Quantity</label>
            <select class="form-control" name="idl_card_qty" id="idl_card_qty">
                @for ($i = 0; $i <= 19; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="lic_col_choice">License Collection Choice</label>
            <select class="form-control" name="lic_col_choice" id="lic_col_choice">
                <option disabled selected></option>    
                <option value="riyadh_safarat">Riyadh (As Safarat) Branch</option>
                <option value="riyadh_hamam">Riyadh (Umm Ul Hamam) Branch</option>
                <option value="jaddah_branch">Jaddah Branch</option>
                <option value="jaddah_branch">Buraydah Branch</option>
                <option value="alkhobar_branch">AlKhobar Branch</option>
                <option value="by_courier">By Courier (with Additional Charges)</option>
            </select>
        </div>
        <div class="form-group">
            <label for="idl_qty">IDL Quantity</label>
            <select class="form-control" name="idl_qty" id="idl_qty">
                @for ($i = 0; $i <= 19; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="univ_adm_country">Country</label>
            <select class="form-control" name="univ_adm_country" id="univ_adm_country">
                <option disabled selected></option>    
                <option value="uk">United Kindom</option>
                <option value="usa">USA</option>
                <option value="canada">Canada</option>
                <option value="australia">Australia</option>
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
                <option value="govt">Govt, Employer Scholarship</option>
                <option value="self">Self-Finance</option>
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
                <option value="high_school">High School</option>
                <option value="bachelors">Bachelors</option>
                <option value="masters">Masters</option>
            </select>
        </div>
        <div class="form-group">
            <label for="last_qualification_grade">Last Qualification Grade</label>
            <select class="form-control" name="last_qualification_grade" id="last_qualification_grade">
                <option disabled selected></option>    
                <option value="weak">Weak</option>
                <option value="fair">Fair/Acceptable</option>
                <option value="good">Good</option>
                <option value="very_good">Very Good</option>
                <option value="excellent">Excellent</option>
            </select>
        </div>
        <div class="form-group">
            <label for="certification">Do you have IELTS or TOEFL Certification?</label>
            <select class="form-control" name="certification" id="certification">
                <option disabled selected></option>    
                <option value="no">I Don't Have Certification</option>
                <option value="ielts">IELTS</option>
                <option value="toefl">TOEFL</option>
            </select>
        </div>
        <div class="form-group">
            <label for="call_time">Select the Best time to call you</label>
            <select class="form-control" name="call_time" id="call_time">
                <option disabled selected></option>    
                <option value="10_to_02">10:00 AM to 02:00 PM</option>
                <option value="03_to_06">03:00 PM to 06:00 PM</option>
                <option value="06_to_09">06:00 PM to 09:00 PM</option>
            </select>
        </div>
        <div class="form-group">
            <label for="form_type">Form Type</label>
            <select class="form-control" name="form_type" id="form_type">
                <option disabled selected></option>    
                <option value="singapore_entry_form">Singapore Entry Form</option>
                <option value="embassay_application">Embassy Application</option>
                <option value="hotel_reservation">Hotel Reservation</option>
                <option value="airline_reservation">Airline Reservation</option>
                <option value="airline_hotel_reservation">Airline + Hotel Reservation</option>
            </select>
        </div>
        <div class="form-group">
            <label for="passport_quantity">Passport Quantity</label>
            <select class="form-control" name="passport_quantity" id="passport_quantity">
                @for ($i = 0; $i <= 19; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <select class="form-control" name="country" id="country">
                <option disabled selected>Select country for worker</option>    
                <option value="india">India</option>
                <option value="indonesia">Indonesia</option>
                <option value="philippines">Philippines</option>
            </select>
        </div>
        <div class="form-group">
            <label for="applicant_name">Applicant Name</label>
            <input type="text" class="form-control" name="applicant_name" id="applicant_name" placeholder="e.g. Ahmed, Abdullah">
        </div>
        <div class="form-group">
            <label for="mobile_number">Mobile Number</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">+966</span>
                </div>
                <input type="text" name="mobile_number" id="mobile_number" class="form-control" aria-label="5xxxxxxxxx" placeholder="5xxxxxxxxx">
                <div class="input-group-append">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smartphone"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect><line x1="12" y1="18" x2="12.01" y2="18"></line></svg></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group mb-3">
                <input type="text" name="email" id="email" class="form-control" aria-label="Email e.g. abc@xyz.com" placeholder="Email e.g. abc@xyz.com">
                <div class="input-group-append">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></span>
                </div>
            </div>
        </div>
        <fieldset class="form-group text-center" id="">
            <div>
                <label class="font-weight-bold"> Service Cost </label>
                <div class="text-primary">
                    <span class="font-weight-bold">239  SAR</span> 
                    <p class="text-primary">Cost Includes: Service fees, IDL License, Collection from one of our branches. Cost DOES NOT include courier delivery.</p>
                </div>
            </div>
        </fieldset>
        <div class="b-overlay-wrap position-relative d-flex flex-column">
            <button type="submit" class="btn w-100 btn-primary">Submit Now !</button>
        </div>
    </div>
</div>
@endsection