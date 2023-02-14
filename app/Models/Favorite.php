<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $table = 'favorite';
    protected $fillable = [
        'user_id',
        'product_id',
        'is_favorite',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->whereStatus(config('dummy.status.active.key'));
    }
}
