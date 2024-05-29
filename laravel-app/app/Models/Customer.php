<?php

namespace App\Models;

use App\Models\Employment;
use App\Models\Transaction;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function user (){
        return $this->belongsTo(ModelsUser::class);
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
    public function latestLoan()
    {
        return $this->hasOne(Loan::class)->latestOfMany();
    }
}
