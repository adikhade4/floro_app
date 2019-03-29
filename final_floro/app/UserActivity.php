<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    protected $table = "useractivity";
    
    protected $fillable = [
        'id', 
        'user_id',
        'old_value',
        'new_value',
        'field_name',
        'modified_by'
   ];

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
