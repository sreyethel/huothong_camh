<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'slides';
    protected $fillable = [
        'link',
        'image',
        'ordering',
        'status',
    ];

    protected $appends = ['image_url'];
    public function getImageUrlAttribute()
    {
        if ($this->image) return asset('file_manager' . $this->image);
        return asset('images/logo/no.jpg');
    }
}