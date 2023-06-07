<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function tradeMark(){
        return $this->belongsTo(TradeMark::class);
    }
    public function section(){
        return $this->belongsTo(Section::class);
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
