<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $table = 'agenda';
    protected $fillable = [
        'id', 'judul', 'tempat', 'jam_mulai', 'jam_selesai', 'tanggal'
    ];

    protected $primaryKey = 'id';

}
