<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AquariumBezoek extends Model
{

    protected $table='aquarium_bezoekingen';

    protected $fillable = ['user_id', 'aquarium_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function aquarium()
    {
        return $this->belongsTo(Aquarium::class);
    }
}
