<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name','surname','phone', 'email', 'date_of_birth',
    ];
    
    public function scopeSamoakitivni($query){
        
        return $query->where('active',1);
    } 
    
    public function scopeNotdeleted($query){
        
        return $query->where('deleted',1);
    }
    
    public function scopeOnlynew($query){
        
        return $query->where('new','new')->orderByRaw('ISNULL(course), course ASC');
    }
}
