<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class file1 extends Model implements HasMedia

{

    use HasFactory;
    use InteractsWithMedia;
    protected $fillable = ['C_ID','T_ID','S_ID','Desc','Name','Path'];
}
