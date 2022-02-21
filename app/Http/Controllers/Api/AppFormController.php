<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Mail\AppAssignMail;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ApplicationAgents;
use App\Models\ApplicationComment;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\ApplicationAttachment;
use App\Notifications\AgentUploadFile;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AgentCommentNotification;


class AppFormController extends Controller
{
    public function getApplications(Request $request){

         //
         $user= $request->user()->load('roles');

        $id = $user->id;
        $q=request('query');
        $role = "";
        if($user->hasAnyRole(['Agent'])){
              $role = "agent";
            //   $applications = Application::where('user_id','=',$id)
            //   ->where('applications.name', 'like', '%' .$q. '%')
            //   ->orderBy('name','DESC')
            //   ->with('agents','attachments')->paginate(env('PAR_PAGE'));

            $applications =  ApplicationAgents::with('applications')->get();

              $process = Application::where('user_id','=',$id)
              ->where('applications.name', 'like', '%' .$q. '%')
              ->where('status','=','0')
              ->orderBy('name','DESC')
              ->with('agents','attachments')->paginate(env('PAR_PAGE'));

              $done =  Application::where('user_id','=',$id)
              ->where('applications.name', 'like', '%' .$q. '%')
              ->where('status','=','1')
              ->orderBy('name','DESC')
              ->with('agents','attachments')->paginate(env('PAR_PAGE'));

            }else if($user->hasAnyRole(['customer'])){
                $role = "customer";
                $applications = Application::where('user_id','=',$id)
                ->where('applications.name', 'like', '%' .$q. '%')
                ->orderBy('name','DESC')
                ->with('agents','attachments')->paginate(env('PAR_PAGE'));

                $process = Application::where('user_id','=',$id)
                ->where('applications.name', 'like', '%' .$q. '%')
                ->where('status','=','0')
                ->orderBy('name','DESC')
                ->with('agents','attachments')->paginate(env('PAR_PAGE'));

                $done =  Application::where('user_id','=',$id)
                ->where('applications.name', 'like', '%' .$q. '%')
                ->where('status','=','1')
                ->orderBy('name','DESC')
                ->with('agents','attachments')->paginate(env('PAR_PAGE'));

            }else{


                $role= "admin";

        $applications = Application::where('name', 'like', '%' .$q. '%')
        ->orderBy('name','DESC')
        ->with('agents','attachments')->paginate(env('PAR_PAGE'));


        $process = Application::where('status','=','0')
        ->orderBy('name','DESC')
        ->with('agents','attachments')->paginate(env('PAR_PAGE'));

        $done = Application::where('status','=','1')
        ->orderBy('name','DESC')
        ->with('agents','attachments')->paginate(env('PAR_PAGE'));

            }
        return response()->json(['applications'=>$applications,'process'=>$process,'done'=>$done,'role'=>$role]);


    }


    public function edit($id){
        $application = Application::with('agents')->find($id);

        if($application){

            return response()->json(['application' => $application]);

        }else{
            return response()->json('No Application Found');
        }

    }

    public function getAppComment($id){
        $comments = ApplicationComment::where('application_id',$id)->get();
        $attachment = ApplicationAttachment::where('application_id',$id)->get();
        return response()->json(['comments'=>$comments,'attachment'=>$attachment]);
    }


    public function getAgentApp(Request $request){
        $role = "agent";
         $applications = ApplicationAgents::where('agent_id',Auth::user()->id)
        ->join('applications','applications.id','=','application_agents.application_id')
        ->get();

        return response()->json(['applications'=>$applications]);


    }

    public function getDownload($id)
{
    $file = ApplicationAttachment::where('id', $id)->first();
    $path = public_path("/app/agent/file/".$file->file);

    return response()->download($path);

}


    public function getAppFile($id){
        $files = ApplicationAttachment::where('application_id',$id)->get();

        return response()->json(['files'=>$files]);
    }


    public function update(Request $request, $id){

        $application = Application::find($id);

        $application->date = $request->date;
        $application->name = $request->name;
        $application->property_value = $request->property_value;
        $application->property_update = $request->property_update;
        $application->property_address =  $request->property_address;
        $application->promotion_detail =$request->property_detail;
        $application->property_type = $request->property_type;
        $application->hoa = $request->hoa;
        $application->fee = $request->fee;
        $application->cash_out = $request->cash_out;
        $application->refinance = $request->refinance;
        $application->payment_assurance = $request->assurance;
        $application->payment_surity = $request->payment_surity;
        $application->purchase = $request->purchase;
        $application->second_loan = $request->second_loan;
        $application->loan_amount = $request->loan_amount;
        $application->investment_property = $request->investment_property;
        $application->is_second_loan = $request->is_second_loan;
        $application->cash_reserve = $request->cash_reserve;
        $application->fico_one = $request->fico_one;
        $application->fico_two = $request->fico_two;
        $application->fico_three = $request->fico_three;
        $application->doc_type = $request->doc_type;
        $application->occupant = $request->occupant;
        $application->income_source = $request->income_source;
        $application->income_type = $request->income_type;
        $application->recent_business_Activity = $request->recent_business;
        $application->business_type = $request->business_Type;
        $application->is_online = $request->is_online;
        $application->tax_return = $request->tax_return;
        $application->recent_business = $request->recent_business;
        $application->is_online_reason = $request->is_online_reason;
        $application->business_line = $request->business_line;
        $application->advice = $request->advice;
        $application->is_business_partner = $request->is_business_partner;
        $application->financial_history = $request->financial_history;
        $application->monthly_rent = $request->monthly_rent;
        $application->user_id = $request->user()->id;
        $application->renovation = $request->renovation;
        $application->mortgage_statement = $request->mortgage_statement;
        $application->property_insured = $request->property_insured;
        $application->liabilities_loans = $request->liabilities_loans;
        $application->update();
        return response()->json();
    }




    public function updateStatus(Request $request,$id){

        $application = Application::find($id);
        $application->status = '1';
        $application->update();
        $agent = ApplicationAgents::create([
            'application_id' => $request->app,
            'agent_id' => $request->agent
        ]);

        if($agent){

            return response()->json(['message'=>'Status Updated Successfully']);
        }else{
            return response()->json(['message'=>'Failed To Update Status']);
        }
    }

    public function assignApp(Request $request){


        $application = Application::find($request->app);

        $application->status = '1';
        $application->update();
        $agent = ApplicationAgents::updateOrCreate([
            'application_id' => $request->app,
            'agent_id' => $request->agent
        ]);

         return response()->json();

    }
    public function deleteApplication(Request $request){
        $application_agent =ApplicationAgents::where('application_id',$request->id)->delete();
        $application_attachment =ApplicationAttachment::where('application_id',$request->id)->delete();
        $application_comment =ApplicationComment::where('application_id',$request->id)->delete();
        $application =  Application::destroy($request->id);
        return response()->json();
    }

    public function getAssignedApp(){

        $assignedApps = Application::where('status','1')->with('agent')->paginate((int)env('PER_PAGE'));
        return response()->json(['assignedApps'=>$assignedApps]);

    }

    public function deleteAssignedApp(Request $request){

        $application_agent =ApplicationAgents::where('application_id',$request->id)->delete();
        // $application_attachment =ApplicationAttachment::where('application_id',$request->id)->delete();
        // $application_comment =ApplicationComment::where('application_id',$request->id)->delete();
        // $application =  Application::destroy($request->id);
        return response()->json();

    }

    public function deleteAppAttachment(Request $request){

        $application_attachment = ApplicationAttachment::where('id',$request->id)->delete();
        return response()->json();

    }


    public function postComment(Request $request){

        $comment = new ApplicationComment;
        $comment->application_id = $request->app;
        $comment->comment = $request->comment;
        $comment->save();
        $user = User::find($request->user);
        $user['comment'] = $request->comment;
        Notification::send($user, new  AgentCommentNotification($user));
        return response()->json();
    }
    public function uploadFile(Request $request){

        if ($request->hasfile('thumbnail')) {

            $file = $request->file('thumbnail')->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
            $name = Str::slug($filename, '-')  . "-" . time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('app/agent/file'), $name);
        } else
            $name = "";

       $app =  ApplicationAttachment::create([
             'application_id' => $request->app,
             'agent_id' => $request->agent,
             'file' => $name
        ]);
        $user = User::where('id',$request->user)->first();
        $user['file'] = $name;
        Notification::send($user, new AgentUploadFile($user));
        return response()->json();
    }

    public function createApplications(Request $request){

        $user = Auth::user();
         $id = "";
        if($user->hasAnyRole(['Agent']) || $user->hasAnyRole(['customer']) ){
            $id = Auth::user()->id;
        }

        $application = Application::Create([
            "date" => $request->date,
            "name" => $request->name,
            "property_value" => $request->property_value,
            "property_update" => $request->property_update,
            "property_address" =>  $request->property_address,
            "promotion_detail" =>$request->property_detail,
            "property_type" => $request->property_type,
            "hoa" => $request->hoa,
            "fee" => $request->fee,
            "cash_out" => $request->cash_out,
            "refinance" => $request->refinance,
            "payment_assurance" => $request->assurance,
            "payment_surity" => $request->payment_surity,
            "purchase" => $request->purchase,
            "second_loan" => $request->second_loan,
            "loan_amount" => $request->loan_amount,
            "investment_property" => $request->investment_property,
            "is_second_loan" => $request->is_second_loan,
            "cash_reserve" => $request->cash_reserve,
            "fico_one" => $request->fico_one,
            "fico_two" => $request->fico_two,
            "fico_three" => $request->fico_three,
            "doc_type" => $request->doc_type,
            "occupant" => $request->occupant,
            "income_source" => $request->income_source,
            "income_type" => $request->income_type,
            "recent_business_Activity" => $request->recent_business,
            "business_type" => $request->business_Type,
            "is_online" => $request->is_online,
            "tax_return" => $request->tax_return,
            "recent_business" => $request->recent_business,
            "is_online_reason" => $request->is_online_reason,
            "business_line" => $request->business_line,
            "advice" => $request->advice,
            "is_business_partner" => $request->is_business_partner,
            "financial_history" => $request->financial_history,
            "monthly_rent" => $request->monthly_rent,
            "renovation" => $request->renovation,
            "mortgage_statement" => $request->mortgage_statement,
            'user_id' => $id,
            "property_insured" => $request->property_insured,
            "liabilities_loans" => $request->liabilities_loans,
        ]);
        if($application){
            return response()->json();

        }else{
             return response()->json('Something Went Wrong');
        }
    }

    public function myApplications()
    {
        $id = Auth::user()->id;
        $applications = Application::where('user_id','=',$id)->get();

        return response()->json(['applications'=>$applications]);

    }

}
