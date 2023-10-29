<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aquarium extends Model
{
    use HasFactory;

    protected $table='aquarium';

    protected $fillable = ['name', 'description'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'aquarium_category');

    }

//    public function categories()
//    {
//        return $this->belongsToMany(Category::class);
//    }
}
