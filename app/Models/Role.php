<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Role extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }   

    static function sameUser($user){
        return $users = Role::select(DB::raw('users.id, users.name,users.email,roles.name AS rol, roles.description'))
                             ->leftJoin('role_user','role_user.role_id','=','roles.id')
                             ->leftJoin('users','users.id','=','role_user.user_id')
                             ->where('role_user.user_id','=',$user)
                             ->paginate();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description'
    ];

}
