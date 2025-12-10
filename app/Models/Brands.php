<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table = 'brands';

    protected $fillable = [
        'category_id',
        'name',
        'country',
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


    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
