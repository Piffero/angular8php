<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['TaskName', 'TaskDescription', 'TaskTime', 'TaskDone'];
    
    public function listAll()
    {
        // select * from tasks
        // order by TaskDone ASC, TaskPriority DESC
        return Task::orderBy('TaskDone', 'ASC')
            ->orderBy('TaskPriority', 'DESC')
            ->get();
    }
}
