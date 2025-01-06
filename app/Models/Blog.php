<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    public $guarded = [];
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function views()
    {
        return $this->hasMany(BlogView::class);
    }
    protected $casts = [
        'view_count' => 'integer',
    ];
}
