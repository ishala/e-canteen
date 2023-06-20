<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $guarded = ['$id'];

    public function seller(){
        return $this->hasMany(Seller::class);
    }

    public function buyer(){
        return $this->hasMany(Buyer::class);
    }
}
