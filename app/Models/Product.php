<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['image_url'];

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn(?string $path) => $path ? asset('storage/' . $path) : null,
        );
    }
}
