<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function scopeNotdeleted($query){
        return $query->where('deleted',0);
    } 
    
    public function scopeFirstlevel($query){
        return $query->where('page_id',0);
    }
    
    public function scopeForpage($query, $pageId){
        return $query->where('page_id',$pageId);
    }
}
