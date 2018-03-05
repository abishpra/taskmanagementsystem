<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table='tasks';
//

    protected $fillable=['assigned_to','title','priority_id','status_id','deadline','attachment','description','comment' ];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\Model\User','assigned_to');
    }
    public function priority()
    {
        return $this->belongsTo('App\Model\Priority','priority_id');
    }
    public function status()
    {
        return $this->belongsTo('App\Model\Status','status_id');
    }

}
