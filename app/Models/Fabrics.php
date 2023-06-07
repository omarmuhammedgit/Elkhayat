<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabrics extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function invoices_purchases(){
        return $this->belongsTo(Invoices_purchases::class);
    }
}
