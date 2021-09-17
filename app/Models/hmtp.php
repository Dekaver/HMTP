<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hmtp extends Model
{
    use HasFactory;
    protected $table = 'hmtp';
    protected $fillable = [
        'id', 'deskripsi', 'visi','misi','struktur_organisasi'
    ];

    protected $primaryKey = 'id';

}
