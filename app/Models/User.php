<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles(){
        return $this->belongsTo(Role::class);
    }

    //check logged user has role
    public function hasRole($role){
        $user_roles=DB::table('users')
                    ->join('role_users','users.id','=','role_users.user_id')
                    ->join('roles','roles.id','=','role_users.role_id')
                    ->where('users.id',Auth::user()->id)
                    ->select('users.*','roles.role_name')
                    ->get();
        foreach($user_roles as $user_role){
            if($user_role->role_name == $role){
                return true;
            }
        }
        return false;
    }
}
