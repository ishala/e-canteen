<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function buyer(){
        return $this->hasMany(Buyer::class);
    }

    public function history(){
        return $this->hasMany(HistoryTransaction::class);
    }

    public function product(){
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
