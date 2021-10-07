<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = "kegiatan";
    protected $fillable = [
        "id_periode",
        "nama",
        "foto",
        "kategori",
    ];

    /**
     * Get the periode associated with the Kegiatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode');
    }
}
