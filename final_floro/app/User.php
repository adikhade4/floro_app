<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\UserActivity;
use Kyslik\ColumnSortable\Sortable;
use Eloquent;

class User extends Authenticatable
{   
    use SoftDeletes;
    use Notifiable;
    use Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable = [
          'username', 
          'email',
          'password',
          'firstname',
          'lastname',
          'address',
          'houseno',
          'postalcode',
          'city',
          'telephoneno',
          'last_login_at',
          'last_login_ip',
          'http_user_agent',
         
          'remember_token'
     ];

     public $sortable = [
                        'username',
                         'email',
                         'firstname',
                         'lastname',
                    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates=['deleted_at','sign_in_at'];

    public function activities()
    {
        return $this->hasmany(UserActivity::class);
    }

    public function authenticationLogs()
    {
        return $this->hasMany(Authentication_Logs::class);
    }

    public function passwordSecurity()
    {
        return $this->hasOne('App\PasswordSecurity');
    }
}
