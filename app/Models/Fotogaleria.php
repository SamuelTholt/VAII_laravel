<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotogaleria extends Model
{
    use HasFactory;

    protected $table = 'fotogaleria';
    protected $primaryKey = 'foto_id';
    public $timestamps = false;

    protected $fillable = [
        'foto_id',
        'nazov',
        'obrazok',
    ];

    public function typFotky()
    {
        return $this->belongsTo(TypFotky::class, 'typ_id');
    }
}
