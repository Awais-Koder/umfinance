<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    public $guarded = [];
    use HasFactory;
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
