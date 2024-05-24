<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $primaryKey = 'dateId';
    public function houses()
    {
        return $this->belongsToMany(House::class, 'house_dates', 'dateID', 'houseID');
    }
}
