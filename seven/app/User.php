<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar',
    ];

    // protected $guarded=[];

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

    public static function uploadAvatar($image){
        $filename=$image->getClientOriginalName();
        auth()->user()->deleteImage();
        $image->storeAs('image',$filename,'public');
        auth()->user()->update(['avatar'=>$filename]);

    }


    protected function deleteImage(){
        if($this->avatar){
            Storage::delete("/public/image/".$this->avatar);
        }
    }

    // //mutanter
    // public function   setPasswordAttribute($password){
    //     $this->attributes['password']=bcrypt($password);

    // }

    // //accessor 
    // public function getNameAttribute($name){
    //     return ucfirst($name); 
    // }

}
