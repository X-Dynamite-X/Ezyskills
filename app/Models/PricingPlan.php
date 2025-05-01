<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PricingPlan extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        "user_id",
        'price',
        "credit",
        'description',
     ];
     public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}