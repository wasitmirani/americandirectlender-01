<?php

namespace App\Models;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ApplicationAgents extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function applications(){
        return $this->belongsToMany(Application::class,'application_agents','agent_id','application_id');
    }



}
