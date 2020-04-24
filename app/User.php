<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Followable;


use App\Tweet;

use App\Like;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'avatar', 'email', 'password',
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
    
    public function tweets()
    {
        return $this->hasMany(Tweet::class);   
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }
    public function getAvatarAttribute($value) {
        if($value) {
            $value = 'storage/'.$value;
        }
        //return 'https://i.pravatar.cc/?u='.$this->email;
        //return asset($value);
        return asset($value ?: '/images/default-avatar.jpeg');
        
    }
    
    public function timeline()
    {
       // return Tweet::where('user_id',$this->id)->latest()->get();
       
        $ids = $this->follows()->pluck('id');        
       // $ids->push($this->id);
        return Tweet::whereIn('user_id',$ids)
                ->orWhere('user_id',$this->id) 
                ->withLikes()
                ->orderByDesc('id')
                ->paginate(50);
                
                //->latest()->get();        
       
    }
    
    public function path($append = '')
    {
        $path = route('profile', $this->name);
        
        return $append ? "{$path}/{$append}" : $path;
    }
    
}
