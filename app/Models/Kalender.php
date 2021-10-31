<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kalender extends Model
{
    use HasFactory;
    protected $table = 'kalender';
    protected $fillable = [
        'id_periode',
        'foto',
        'deskripsi',
    ];

    protected $primaryKey = 'id';

    
    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id');
    }

    
}
