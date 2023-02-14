<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $fillable = [
        'user_id',
        'product_id',
        'quality_rate',
        'service_rate',
        'delivery_rate',
        'comment',
    ];
}
