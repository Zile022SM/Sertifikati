<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model {

    public function getImage($dimension = 'xl') {//parametar koji dolazi od korisnika
        $image = $this->image; //dohvatamo trenutnu sliku
        if (!in_array($dimension, ['xl', 'm', 's'])) {
            $dimension = 'xl';
        }//ispitujemo da li u nizu postoji nastavak naziva slike koju je korisnik poslao
        $extension = pathinfo($image, PATHINFO_EXTENSION); //dohvatamo ekstenziju slike
        $image = str_replace('.' . $extension, "", $image); //odstranjujemo ekstenziju
        $image = $image . '-' . $dimension . '.' . $extension; //dodajemo na sliku nastavak koji je trazen u samoj funkciji

        return $image; //vracamo celu sliku
    }

}
