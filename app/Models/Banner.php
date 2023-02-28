<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banner';
    protected $fillable = [
        'title',
        'page',
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
