<?php

namespace App\Http\Controllers\backend\notify;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\NotifcationMail;
use App\Notifications\NotifyUser;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{

    public function index(){

        $notifications=DB::table('notifications')->where('notifiable_id',Auth::user()->id)->latest()->get();

        $notContent = "";
        foreach($notifications as $notification){
             $notContent = json_decode($notification->data);
             $notifications['content'] = json_decode($notification->data);
        }

        $users=Role::select('id','name')->with('users:id,name')->orderBy('name','ASC')->get();
        return response()->json(['notifications'=>$notifications,'users'=>$users]);

    }
    public function show($id){
      $notification = DB::table('notifications')->where('id',$id)->first();
      return response()->json(['notification'=>$notification]);
    }
    public function store(Request $request){

        $users = User::WhereIn('id',  $request->users)->get();


        $notificationdata =(object)[
            'title' =>$request->title,
            'body' => $request->body,
        ];
        $lead_mail = env('LEAD_MAIL');
        $res=collect($users)->map(function($user) use ($notificationdata,$lead_mail){
            $details = [
                'title' => 'Hi,'.$user->name,
                'url' => url('/')."",
            ];
            Mail::to($lead_mail)->send(new NotifcationMail($details));
           return $user->notify(new NotifyUser($notificationdata));
        });

        return response()->json(['notifications'=>$res]);
    }
}
