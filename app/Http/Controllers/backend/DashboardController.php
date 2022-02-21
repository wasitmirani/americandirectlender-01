<?php

namespace App\Http\Controllers\backend;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ApplicationAgents;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function index(){
        return view('backend.pages.dashboard');
    }
    public function getDashboard(Request $request){

        $user= $request->user()->load('roles');
        $id = $user->id;
        $role = $user->roles->pluck('name');

        if($user->hasAnyRole(['Agent'])){

            $application = Application::where('user_id','=',$id);
            $applications =  $application->select(DB::raw('DATE_FORMAT(DATE(applications.created_at), "%d %M %Y") as created_at'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('DATE_FORMAT(DATE(applications.created_at), "%d %M %Y")'))
            ->get();
            $users = User::all()->count();
            $total_applications = Application::where('user_id','=',$id)->count();
            $total_roles = Role::all()->count();
            $apps_status = $application->
            select( DB::raw('count(applications.status) as count, applications.status'))->
            groupBy('applications.status')->get();
            $assigned_apps =  $application->where('status','1')->count();
            $agents=Role::select('name')->where('name','=','agent')->withCount('users')->get();
            $userByRole = Role::select('name')->withCount('users')->get();
            $userByPermission = Permission::select('name')->withCount('users')->get();
            $totalPermissions = $userByPermission->count();

        }else if($user->hasAnyRole(['customer'])){

            $application = Application::where('user_id','=',$id);
            $applications =  $application->select(DB::raw('DATE_FORMAT(DATE(applications.created_at), "%d %M %Y") as created_at'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('DATE_FORMAT(DATE(applications.created_at), "%d %M %Y")'))
            ->get();
            $users = User::all()->count();
            $total_applications = Application::where('user_id','=',$id)->count();
            $total_roles = Role::all()->count();
            $apps_status = $application->
            select( DB::raw('count(applications.status) as count, applications.status'))->
            groupBy('applications.status')->get();
            $assigned_apps =  $application->where('status','1')->count();
            $agents=Role::select('name')->where('name','=','customer')->withCount('users')->get();
            $userByRole = Role::select('name')->withCount('users')->get();
            $userByPermission = Permission::select('name')->withCount('users')->get();
            $totalPermissions = $userByPermission->count();

        }else{

                $applications = Application::select(DB::raw('DATE_FORMAT(DATE(created_at), "%d %M %Y") as created_at'), DB::raw('COUNT(*) as total'))->
                groupBy(DB::raw('DATE_FORMAT(DATE(created_at), "%d %M %Y")'))->
                get();
                $total_applications= Application::all()->count();
                $total_roles = Role::all()->count();
                $apps_status = DB::table('applications')->
                select( DB::raw('count(applications.status) as count, applications.status'))->
                groupBy('applications.status')->get();
                $users = User::all()->count();
            $userByPermission = Permission::select('name')->withCount('users')->get();
            $totalPermissions = $userByPermission->count();
            $users = User::all()->count();
            $assigned_apps = Application::where('status','1')->count();
            $agents=Role::select('name')->where('name','=','agent')->withCount('users')->get();
            $userByRole = Role::select('name')->withCount('users')->get();
            }

        return response()->json(['role'=>$role,'userByPermission'=>$userByPermission,'userByRole'=>$userByRole,'dateby_applications'=>$applications,'users'=>$users,'roles'=>$agents,'total_application'=>$total_applications,'total_roles'=>$total_roles,'assigned_apps'=>$assigned_apps,'app_status'=>
        $apps_status,'userByRole'=>$userByRole,'totalPermissions'=>$totalPermissions]);
    }

public function recentApp(Request $request){
        $user= $request->user()->load('roles');
        $id = $user->id;
        if($user->hasAnyRole(['Agent'])){
            $application = Application::where('user_id','=',$id);
            $recentApps =   $application->orderBy('applications.id','DESC')->limit(5)->get();
        }else if($user->hasAnyRole(['customer'])){
            $application = Application::where('user_id','=',$id);
            $recentApps =   $application->orderBy('applications.id','DESC')->limit(5)->get();
        }else{
            $recentApps = Application::orderBy('id','DESC')->limit(5)->get();
        }
        return response()->json(['applications'=>$recentApps]);

    }


}
