<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class PasswordManager extends Model
{
    use HasFactory;

    protected $table = 'password_manager';

    protected $guarded = [];

    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn(string $password) => Crypt::decryptString($password),
        );
    }
}
