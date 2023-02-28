<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partners';
    protected $fillable = [
        'name',
        'link',
        'logo',
        'status',
    ];

    protected $appends = ['logo_url'];
    public function getLogoUrlAttribute()
    {
        if ($this->logo) return asset('file_manager' . $this->logo);
        return (new \Laravolt\Avatar\Avatar)->create($this->name)->toBase64();
    }
}