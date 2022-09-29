<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Helper\Uuid;

class Meta extends Model
{
    use HasFactory, Uuid;
}
