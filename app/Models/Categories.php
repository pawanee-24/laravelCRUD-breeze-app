<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',

        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
        'deleted',
    ];

    public $timestamps = false;

    public function brands()
    {
        return $this->hasMany(Brands::class);
    }
}
