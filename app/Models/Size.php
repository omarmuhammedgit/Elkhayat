<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
    public function fabric(){
        return $this->belongsTo(Fabrics::class);
     }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
     public function seamoer(){
        return $this->belongsTo(Seamoer::class);
     }
     public function retribution(){
        return $this->belongsTo(Retribution::class);
     }
     public function design(){
        return $this->belongsTo(design::class);
     }
     public function section(){
        return $this->belongsTo(Section::class);
     }
     public function tradeMark(){
        return $this->belongsTo(TradeMark::class);
     }
}
