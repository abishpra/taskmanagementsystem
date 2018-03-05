<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table="notifications";

    protected $fillable=['user_id','task_id'];

    public function task()
    {
        return $this->belongsTo('App\Model\Task','task_id');
    }
}
