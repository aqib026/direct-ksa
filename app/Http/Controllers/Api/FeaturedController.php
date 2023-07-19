<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FeaturedResource;
use App\Models\FeaturedSales;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerFormReportMail;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\FeaturedSalesResource;
use App\Models\Note;

class FeaturedController extends Controller
{
    public function index()
    {
        $featured= FeaturedSales::all();
        return FeaturedResource::collection($featured);
    }
    
    public function store(Request $request)
    {
        $input=json_decode($request->getContent(),true);
        
        // Check if the user is logged in
        if (auth()->check()) {
            // User is logged in, set the user_id from the logged-in user
            $user = auth()->user();
        } else {
            // User is not logged in, check if the email or mobile_number exists in the users table
            $user = Admin::where('email', $request->input('email'))->first();
            // If no user found, create a new user record
            if (!$user) {
                $user = Admin::create([
                    'name' => $input['applicant_name'],
                    'email' => $input['email'],
                    'number' => $input['mobile_number'],
                    'password' => bcrypt('12345678'),
                    'usertype' => 'customer',
                ]);
            }
        }
        
        // Set the user_id in the featured sales or perform any other necessary actions
        $validatedData = $request->validate([
            'required_service'  => 'required',
            'applicant_name'    => 'required',
            'mobile_number'     => 'required',
            'email'             => 'required'
        ], [
            'required_service.required' => 'Required Service is required',
            'applicant_name.required'   => 'Applicant Name is required',
            'mobile_number.required'    => 'Mobile No is required',
            'email.required'            => 'Email is required'
        ]);
        
        $input = $request->all();
        
        $images = array();
        if ($files = $request->file('documents')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move('image', $name);
                $images[] = $name;
            }
        }
        
        $featuredSales = new FeaturedSales();
        
        $featuredSales->required_service = $request->required_service;
        $featuredSales->paper_quantity = $request->paper_quantity;
        $featuredSales->documents = implode("|", $images);
        $featuredSales->translation_content = $request->translation_content;
        $featuredSales->idl_card_qty = $request->idl_card_qty;
        $featuredSales->lic_col_choice = $request->lic_col_choice;
        $featuredSales->idl_qty = $request->idl_qty;
        $featuredSales->univ_adm_country = $request->univ_adm_country;
        $featuredSales->nationality = $request->nationality;
        $featuredSales->mode_of_finance = $request->mode_of_finance;
        $featuredSales->major_of_study = $request->major_of_study;
        $featuredSales->current_qualification = $request->current_qualification;
        $featuredSales->last_qualification_grade = $request->last_qualification_grade;
        $featuredSales->certification = $request->certification;
        $featuredSales->call_time = $request->call_time;
        $featuredSales->form_type = $request->form_type;
        $featuredSales->passport_quantity = $request->passport_quantity;
        $featuredSales->country = $request->country;
        $featuredSales->applicant_name = $request->applicant_name;
        $featuredSales->mobile_number = $request->mobile_number;
        $featuredSales->email = $request->email;
        $featuredSales->service_cost = $request->service_cost;
        $featuredSales->user_id = $user->id;
        
        $featuredSales->save();
        
        Mail::to('admin@directksa.com')->send(new CustomerFormReportMail($request->all()));
        
        if ($featuredSales) {
            return response()->json(['success' => true, 'message' => 'FeaturedSales added successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to add FeaturedSales']);
        }
    }
    
    public function services()
    {
        if (Auth::id()) {
            $user = Auth()->user();
            $usertype = $user->usertype;
            if ($usertype == 'customer') {
                $accre = FeaturedSales::where('user_id', Auth::user()->id)->get();
                return FeaturedSalesResource::collection($accre);
            } else {
                return response()->json(['message' => 'Unauthorized.'], 401);
            }
        } else {
            return response()->json(['message' => 'Unauthorized.'], 401);
        }
    }
    
    public function detail($id)
    {
        if (Auth::id()) {
            $user = Auth()->user();
            $usertype = $user->usertype;
            if ($usertype == 'customer') {
                $featured_sale = FeaturedSales::find($id);
                if ($featured_sale) {
                    $notes = Note::where('featured_id', $id)->get();
                    return response()->json(['featured_sale' => $featured_sale, 'notes' => $notes], 200);
                } else {
                    return response()->json(['message' => 'FeaturedSale not found.'], 404);
                }
            } else {
                return response()->json(['message' => 'Unauthorized.'], 401);
            }
        } else {
            return response()->json(['message' => 'Unauthorized.'], 401);
        }
    }
    
}
