<?php

namespace App\Http\Controllers;

use App\Mail\CustomerFormReportMail;
use App\Models\FeaturedSales;
use App\Models\Note;
use App\Models\Admin;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
         
         $validatedData = $request->validate([
            'required_service'  => 'required',
            'applicant_name'    => 'required',
            'mobile_number'     => 'required|regex:/^[0-9]{9,14}$/',
            'email' => 'required|email:rfc,dns'
        ], [
            'required_service.required' => 'Required Service is required',
            'applicant_name.required'   => 'Applicant Name is required',
            'mobile_number.required'    => 'Mobile No is required',
            'email.required'            => 'Email is required',
            'mobile_number.regex'    => 'Enter valid mobile number',

        ]);
        $new_user_message="";
        if(auth()->check()){
            $user=User::where('email', $request->email)->first();
        }
        elseif($request->email){
            $user=User::where('email', $request->email)->first();
            if(!$user){
                $user=User::create([
                    "name"=>$request->applicant_name,
                    "number"=>"+966".$request->mobile_number,
                    "email"=>$request->email,
                    "password"=>Hash::make('12345678')
                ]);
                $new_user_message="The email is  registered in our system .You can use this email to login via OTP and you can update your password by using forget password link.";
            }
        }
        if($request->mobile_number){
            $request->merge(['mobile_number' => '+966' . $request->mobile_number]);
        };
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
         $FeaturedSales->applicant_name              = $user->name;
         $FeaturedSales->mobile_number               = $user->number;
         $FeaturedSales->email                       = $user->email;
         $FeaturedSales->service_cost            = $request->service_cost;
         $FeaturedSales->user_id                = $user->id;

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
            $success_message='Your request for selected service has been submitted Successfuly.Our team will contact ASAP <br> '.$new_user_message;
             return redirect(route('featured_sales_thankyou'))->with('success',$success_message );
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
