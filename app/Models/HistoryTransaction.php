<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryTransaction extends Model
{
    use HasFactory;

    protected $guarded = ['$id'];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function buyer(){
        return $this->belongsToMany(Buyer::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function seller(){
        return $this->belongsToMany(Seller::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
