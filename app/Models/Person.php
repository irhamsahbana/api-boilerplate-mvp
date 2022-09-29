<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Helper\Uuid;

class Person extends Model
{
    use HasFactory, Uuid;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
