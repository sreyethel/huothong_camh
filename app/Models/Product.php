<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'size',
        'price',
        'discount',
        'category',
        'type',
        'content',
        'thumbnail',
        'gallery',
        'status',
    ];

    protected $appends = ['thumbnail_url'];
    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) return asset('file_manager' . $this->thumbnail);
        return asset('images/logo/no.jpg');
    }

    public function customProductColor()
    {
        return $this->hasMany(ProductColor::class, 'product_id')->whereStatus(config('dummy.status.active.key'))->orderByDesc('id');
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'product_id');
    }

    public function reviewCalculateStar()
    {
        $quality    = $this->review()->avg('quality_rate');
        $service    = $this->review()->avg('service_rate');
        $delivery   = $this->review()->avg('delivery_rate');
        return round(($quality + $service + $delivery) / 3);
    }
}
