<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Obat extends Model
{
    protected $fillable = [
        'nama_obat',
        'kemasan',
        'harga'
    ];
<<<<<<< HEAD

    public function detail_periksas(): HasMany
    {
        return $this->hasMany(DetailPeriksa::class, 'id_obat', 'id');
    }
}
=======
    public function detail_obat(){
        return $this->hasMany(DetailPeriksa::class, 'id_obat', 'id');
    }
}
>>>>>>> 93e6fae (Tugas Bengkod3)
