<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'title_srp','title_eng','name','surname','description_srp', 'description_eng', 'image',
    ];
    
    public function scopeSamoakitivni($query){
        
        return $query->where('active',1);
    } 
    
    public function scopeNotdeleted($query){
        
        return $query->where('deleted',1);
    }
    
    public function getImage($dimension='xl'){//parametar koji dolazi od korisnika
        $image= $this->image;//dohvatamo trenutnu sliku
        if(!in_array($dimension, ['xl','m','s'])){
            $dimension='xl';
        }//ispitujemo da li u nizu postoji nastavak naziva slike koju je korisnik poslao
        $extension= pathinfo($image, PATHINFO_EXTENSION);//dohvatamo ekstenziju slike
        $image= str_replace('.'.$extension ,"", $image);//odstranjujemo ekstenziju
        $image=$image.'-'.$dimension.'.'.$extension;//dodajemo na sliku nastavak koji je trazen u samoj funkciji
        
        return $image;//vracamo celu sliku
    }
}
