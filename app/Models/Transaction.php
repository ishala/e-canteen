<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['$id', 'id_buyer', 'id_product'];

    public function buyer(){
        return $this->belongsTo(Buyer::class);
    }

    public function history(){
        return $this->belongsTo(HistoryTransaction::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function seller(){
        return $this->belongsTo(Seller::class);
    }
}
