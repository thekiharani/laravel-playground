<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function getNameAttribute(){
        return $this->first_name .' '.$this->last_name;
    }
}
