<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypFotky extends Model
{
    use HasFactory;

    protected $table = 'typfotky';
    protected $primaryKey = 'typ_id';
    public $timestamps = false;


    public function fotky()
    {
        return $this->hasMany(Fotogaleria::class, 'typ_id');
    }
}
