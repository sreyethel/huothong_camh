<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'blogs';
    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'status',
    ];

    protected $appends = ['thumbnail_url'];
    public function getThumbnailUrlAttribute()
    {
        if ($this->thumbnail) return asset('file_manager' . $this->thumbnail);
        return asset('images/logo/no.jpg');
    }
}
