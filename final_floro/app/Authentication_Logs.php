<?php

namespace App;

use Eloquent;

use Illuminate\Database\Eloquent\Model;

class Authentication_Logs extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "authentication_logs";
    
   protected $fillable = [
      
        'user_id',
        'ip_address',
        'login_time',
        'logout_time',
        'browser_agent',
    ];

   

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}