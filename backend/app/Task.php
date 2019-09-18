<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['TasktName', 'TaskDescription', 'TaskTime', 'TaskDone'];
}
