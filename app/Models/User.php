<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }  
        
    static function sameRole($role){
        return $users = User::select(DB::raw('users.id, users.name,users.email,roles.name AS rol, roles.description'))
                             ->leftJoin('role_user','role_user.user_id','=','users.id')
                             ->leftJoin('roles','roles.id','=','role_user.role_id')
                             ->where('role_user.role_id','=',$role)
                             ->paginate();
    }

    public function tokenCreate(){
        $token = Str::random(64);

        $this->token = $token;
        $this->save();

        return $token;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
