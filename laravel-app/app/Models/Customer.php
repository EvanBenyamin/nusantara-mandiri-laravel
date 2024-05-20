<?php

namespace App\Models;

use App\Models\Employment;
use App\Models\Transaction;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user (){
        return $this->belongsTo(User::class);
    }
    public function transaction (){
        return $this->hasMany(Transaction::class);
    }
    public function employment (){
        return $this->belongsTo(Employment::class);
    }
    public function loan (){
        return $this->hasMany(Loan::class);
    }
}
