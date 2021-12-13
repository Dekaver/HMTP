<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;
    protected $table = 'lab';
    protected $fillable = [
        'id_periode', 'deskripsi', 'kepala_lab', 'asisten_lab', "kegiatan", "nama"
    ];

    protected $primaryKey = 'id';

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode', 'id');
    }
    
    public function Kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'kategori', 'kegiatan');
    }
}
