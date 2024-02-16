<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;//Трейд некая реализация методов или логики
    protected $table ='posts';
    protected $guarded = [];// [] или false можно писать
    //protected $fillable = ['content'];Разрешение на вставку только определённых колонок
}
