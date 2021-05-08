<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hclass extends Model
{
    use HasFactory;
    protected $fillable = ["id","Name","TName","MaxStu","S_ID","T_ID",];
}
