<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorie extends Model
{
    use HasFactory;

    protected $table = 'kategorie';
    protected $primaryKey = 'kategoria_id';
    public $timestamps = false;


    public function jedla()
    {
        return $this->hasMany(Jedla::class, 'kategoria_id');
    }
}
