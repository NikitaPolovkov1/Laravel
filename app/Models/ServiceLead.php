<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceLead extends Model
{
    use HasFactory;

    protected $fillable = ['service_name', 'name', 'email', 'phone'];
}

