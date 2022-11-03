<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    const ADMINISTRATOR="administrator";
    const MODERATOR="moderator"; 
    
    public function scopeNotdeleted($query){
        
        return $query->where('deleted',0);
    } 
    
    public function scopeSamoakitivni($query){
        
        return $query->where('active',1);
    } 
//    public function scopeOlderthan($query,$years){
//        
//        return $query->where('yeras','>',$years);
//    }
    
}
