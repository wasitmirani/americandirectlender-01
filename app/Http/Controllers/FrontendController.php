<?php

namespace App\Http\Controllers;

use App\Models\AppForm;
use App\Models\Contact;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Mail\ApplicationMail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    //

    public function index(){


        return view('frontend.pages.index');
    }

    public function refinance(){


        return view('frontend.pages.refinance');
    }

    public function appForm(){


        return view('frontend.pages.appform');
    }

    public function storeAppForm(Request $request){

        //  $request->validate([
        //     "date" => "required",
        //     "name" => "required",
        //     "property_value" => "required",
        //     "propert_update" => "required",
        //     "property_address" => "required",
        //     "countrproperty_type" => "required",
        //     "hoa" => "required",
        //     "fee" => "",
        //     "cash_out" => null,
        //     "refinance" => null,
        //     "payment_assurance" => "yes",
        //     "payment_surity" => "yes",
        //     "purchase" => "yes",
        //     "second_loan" => "yes",
        //     "is_second_loan" => "payoff",
        //     "loan_amount" => "0-548k",
        //     "cash_reserve" => "45",
        //     "fico" => "required",
        //     "loan_doc_type" => "full",
        //     "occupant" => "owner",
        //     "income_type" => "w-2",
        //     "icome_source" => "gfdh",
        //     "promotion_detail" => "dfv",
        //     "business_type" => "DBA",
        //     "is_oline" => "yes",
        //     "is_online_reason" => "efs",
        //     "tax_return_provided" => "yes",
        //     "recent_busines" => "fev",
        //     "business_line" => "1-2 Year(s)",
        //     "advice" => "vf",
        //     "is_business_partner" => "on",
        //     "financial_history" => "Foreclosure",
        //     "investment_property" => "5",
        //     "renovation" => "yes",
        //     "mortgage" => "yes",
        //     "property_insured" => "yes",

        // ]);

        $application = new Application;

        $application->date = $request->date;
        $application->name = $request->name;
        $application->property_value = $request->property_value;
        $application->property_update = $request->propert_update;
        $application->property_address = $request->property_address;
        $application->property_type = $request->property_type;
        $application->fee = $request->fee;
        $application->cash_reserve = $request->cash_reserve;
        $application->fico_one = $request->fico_one;
        $application->fico_two = $request->fico_two;
        $application->fico_three = $request->fico_three;
        $application->hoa = $request->hoa;
        $application->income_source = $request->income_clarification;
        $application->cash_out = $request->cash_out;
        $application->refinance = $request->refinance;
        $application->payment_assurance = $request->payment_assurance;
        $application->payment_surity = $request->payment_surity;
        $application->purchase = $request->purchase;
        $application->second_loan = $request->second_loan;
        $application->is_second_loan = $request->is_second_loan;
        $application->doc_type = $request->loan_doc_type;
        $application->occupant = $request->occupant;
        $application->income_type = $request->income_type;
        $application->income_source = $request->income_source;
        // $application->income_clarification = $request->income_clarification;
        $application->promotion_detail = $request->promotion_detail;
        $application->business_type = $request->business_type;
        $application->is_online = $request->is_online;
        $application->is_online_reason = $request->is_online_reason;
        $application->is_business_partner = $request->is_business_partner;
        $application->financial_history = $request->financial_history;
        $application->investment_property = $request->investment_property;
        $application->renovation = $request->renovation;
        $application->mortgage_statement = $request->mortgage;
        $application->property_insured = $request->property_insured;
        $application->loan_amount = $request->loan_amount;
        $application->cash_reserve = $request->cash_reserve;
        $application->is_online_reason = $request->is_online_reason;
        $application->recent_business_Activity = $request->recent_business;
        $application->recent_business = $request->recent_business;
        $application->advice = $request->advice;
        $application->tax_return = $request->tax_return_provided;
        $application->business_line = $request->business_line;
        $application->liabilities_loans = $request->liabilities_loans;
        $application->investment_property = $request->investment_property;

         if($application->save()){
            
            return back()->with('message',"App Form Data Added Successfully");

        }else{
            return back()->with('message','Something Went Wrong');
        }




    }


    public function contactUs(){

        return view('frontend.pages.contact');

    }

    public function contact(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $message = new Contact;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->phone = $request->phone;
        $message->message = $request->message;
        if($message->save()){
            Mail::to('haseebhassan006@gmail.com')->send(new ContactMail($message));
            return back()->with('message','Your Details Submited Successfully');
        }else{
            return back()->with('message','Faile To Send Message');
        }

    }
}
