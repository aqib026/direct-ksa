<?php

namespace App\Http\Controllers;

use App\Mail\CustomerFormReportMail;
use App\Models\FeaturedSales;
use App\Models\Note;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class FeaturedSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $service = '')
    {
        $user=Auth::user();
        $data=compact('user');
        return view('frontend.featuredSales', compact('service'))->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeaturedSales  $id
     * @return \Illuminate\Http\Response
     */
    public function thankyou()
    {
        return view('frontend.thankyou');
    }


    /**
     * Display a listing of the resource in admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $search = $request["search"] ?? "";
        if ($search != "") {
            $featured_sales = FeaturedSales::where('applicant_name', 'like', "%$search%")->orderBy('id', 'DESC')->paginate(20);
        } else {
            $featured_sales = FeaturedSales::orderBy('id', 'DESC')->paginate(20);
        }
        $data = compact('featured_sales', 'search');
        return view('admin.featured_sales.featured_sales')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function store(Request $request)
     {
         $user = null;

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
                     'name' => $request->input('applicant_name'),
                     'email' => $request->input('email'),
                     'number' => $request->input('mobile_number'),
                     'password' => bcrypt('12345678'),
                     'usertype' => 'customer',
                 ]);
             }
         }


         // Set the user_id in the featured sales or perform any other necessary actions
         $validatedData = $request->validate([
            'required_service'  => 'required',
            'applicant_name'    => 'required',
            'mobile_number'     => ['required', 'regex:/^[0-9]{9,14}$/'],
            'email' => ['required', 'string', 'regex:/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/', 'max:255']
        ], [
            'required_service.required' => 'Required Service is required',
            'applicant_name.required'   => 'Applicant Name is required',
            'mobile_number.required'    => 'Mobile No is required',
            'email.required'            => 'Email is required'
        ]);

         $input = $request->except('documents', '_token');
         $images = array();
         if ($files = $request->file('documents')) {
             foreach ($files as $file) {
                 $name = $file->getClientOriginalName();
                 $file->move('image', $name);
                 $images[] = $name;
             }
         }
         $input['document']=$images;
         $FeaturedSales                              = new FeaturedSales();
         $FeaturedSales->required_service            = $request->required_service;
         $FeaturedSales->paper_quantity              = $request->paper_quantity;
         $FeaturedSales->documents                   = implode("|", $images);
         $FeaturedSales->translation_content         = $request->translation_content;
         $FeaturedSales->idl_card_qty                = $request->idl_card_qty;
         $FeaturedSales->lic_col_choice              = $request->lic_col_choice;
         $FeaturedSales->idl_qty                     = $request->idl_qty;
         $FeaturedSales->univ_adm_country            = $request->univ_adm_country;
         $FeaturedSales->nationality                 = $request->nationality;
         $FeaturedSales->mode_of_finance             = $request->mode_of_finance;
         $FeaturedSales->major_of_study              = $request->major_of_study;
         $FeaturedSales->current_qualification       = $request->current_qualification;
         $FeaturedSales->last_qualification_grade    = $request->last_qualification_grade;
         $FeaturedSales->certification               = $request->certification;
         $FeaturedSales->call_time                   = $request->call_time;
         $FeaturedSales->form_type                   = $request->form_type;
         $FeaturedSales->passport_quantity           = $request->passport_quantity;
         $FeaturedSales->country                     = $request->country;
         $FeaturedSales->applicant_name              = $request->applicant_name;
         $FeaturedSales->mobile_number               = '+96'.$request->mobile_number;
         $FeaturedSales->email                       = $request->email;
         $FeaturedSales->service_cost                = $request->service_cost;
         $FeaturedSales->user_id                     = $user->id;

         $FeaturedSales->save();
         try {
             Mail::to('info@exvisas.com')->send(new CustomerFormReportMail($input));
         } catch (Exception $e) {
             Log::build([
                 'driver' => 'single',
                 'path' => storage_path('logs/services-email-erros.log'),
              ])->info('There is problem while sending email: '.print_r($e->getMessage(), true));
         }

         if ($FeaturedSales) {
             return redirect(route('featured_sales_thankyou'))->with('success', 'Your request for selected service has been submitted Successfuly.Our team will contact ASAP');
         }

         // Redirect or return a response as needed
     }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeaturedSales  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FeaturedSales $id)
    {
        if ($id != "") {
            return view('admin.featured_sales.featured_sale_show')->with('featured_sale', $id);
        } else {
            return redirect('admin/featured_sales');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FeaturedSales  $featuredSales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        {
            $featured_sale = FeaturedSales::find($id);

            if (is_null($featured_sale)) {    //not found
                return redirect('admin/featured_sales');
            } else {
                $url = url('admin/featured_sale/update') . "/" . $id;

                $note = Note::where('featured_id', $id)->get();
                $data = compact('featured_sale', 'url', 'note');
                return view('admin.featured_sales.featured_sale_show')->with($data);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeaturedSales  $featuredSales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $FeaturedSales = FeaturedSales::find($id);
        $FeaturedSales->status = $request['status'];


        $FeaturedSales->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $FeaturedSales = FeaturedSales::find($id);
        if (!is_null($FeaturedSales)) {
            $FeaturedSales->delete();
        }

        return redirect('admin/featured_sales');
    }
}
