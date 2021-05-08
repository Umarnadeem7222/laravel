<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class allclass extends Model
{
    use HasFactory;
    protected $fillable = ["id","Name","TName","MaxStu","T_ID",];

}
