<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employment extends Model
{
    use HasFactory;

    public function Customer(){
        $this->hasMany(Customer::class);
    }
}
