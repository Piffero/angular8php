<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    protected $fillable = ['TaskId', 'TaskUserId', 'TaskDone'];
    
    public function getDevOfTask($idTask) 
    {
        return TaskUser::where('TaskId', $idTask)
                       ->get();
    }
}
