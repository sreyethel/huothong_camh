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
        'title',
        'slug',
        'price',
        'size',
        'content',
        'thumbnail',
        'gallery',
        'feature',
        'status',
    ];
    // protected $casts = [
    //     'feature' => ' array',
    // ];
    protected $appends = ['thumbnail_url'];

    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) return asset('file_manager' . $this->thumbnail);
        return asset('images/logo/no.jpg');
    }

    public function getFeatures()
    {
        return $this->hasOne('App\Models\Feature');
    }
}