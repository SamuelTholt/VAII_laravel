<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jedla extends Model
{
    use HasFactory;

    protected $table = 'jedla';
    protected $primaryKey = 'jedlo_id';
    public $timestamps = false;


    protected $fillable = [
        'kategoria_id',
        'nazov',
        'popis',
        'alergeny',
        'cena',
    ];
    
    public function kategoria()
    {
        return $this->belongsTo(Kategorie::class, 'kategoria_id');
    }
}
