<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;
    protected $fillable= ['Msg','T_ID','S_ID','C_ID','C_NAME','S_NAME'];
}
