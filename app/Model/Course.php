<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Teacher;

class Course extends Model {

    public function scopeNotdeleted($query) {

        return $query->where('deleted', 1);
    }

}
