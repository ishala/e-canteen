<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['$id', 'id_seller'];

    public function buyer(){
        return $this->hasMany(Buyer::class);
    }

    public function history(){
        return $this->hasMany(HistoryTransaction::class);
    }

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
