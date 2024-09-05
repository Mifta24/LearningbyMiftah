<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    // data yang boleh diisi
    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    // cara kedua
    // data yang dijaga hanya id
    // boleh dipakai jika tidak ada data sensitiv karna user bisa masukin data apapun kecuali id
    protected $guarded = [
        'id'
    ];


    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

}
