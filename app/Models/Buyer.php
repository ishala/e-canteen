<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;
    protected $guarded = ['$id'];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function seller(){
        return $this->belongsToMany(Seller::class);
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }

    public function history(){
        return $this->hasMany(HistoryTransaction::class);
    }
}
