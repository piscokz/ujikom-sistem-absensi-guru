<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SistemOtomatis extends Model
{
    use HasFactory;

    protected $table = 'sistem_otomatis';
    protected $fillable = ['enabled'];

    public static function current(): self
    {
        return static::firstOrCreate([], ['enabled' => true]);
    }

    public static function enabled(): bool
    {
        return static::current()->enabled;
    }
}
